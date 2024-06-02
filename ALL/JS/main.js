let title = document.getElementById('title');
let date = document.getElementById('date');
let wilaya = document.getElementById('wilaya');
let place1 = document.getElementById('place1');
let place2 = document.getElementById('place2');
let place3 = document.getElementById('place3');
let heure_derpart = document.getElementById('heur_depart');
let heure_arrive = document.getElementById('heur_arrive');
let count = document.getElementById('count');
let category = document.getElementById('category');
let submit = document.getElementById('submit');

            



//creat sortie
let dataPro;

if(localStorage.sortie != null){
     dataPro = JSON.parse(localStorage.sortie)
}
else{
     dataPro=[];
}



submit.onclick = function(){
  let newPro = {
        title:title.value,
        date:date.value,
        wilaya:wilaya.value,
        place1:place1.value,
        place2:place2.value,
        place3:place3.value,
        heure_derpart:heure_derpart.value,
        heure_arrive:heure_arrive.value,
        count:count.value,
        category:category.value,

  }
  dataPro.push(newPro)
  localStorage.setItem('sortie', JSON.stringify(dataPro))



  clearData()
  showData()
}



//clear inputs

function clearData(){
  title.value='';
  date.value='';
  wilaya.value='';
  place1.value='';
  place2.value='';
  place3.value='';
  heure_derpart.value='';
  heure_arrive.value='';
  count.value='';
  category.value='';


}

// afficher les donners


function showData(){
    let tabel ='';
    for(let i =0 ;i<dataPro.length;i++){
        tabel += `
        <tr>
          <td>${i}</td>
          <td>${dataPro[i].title}</td>
          <td>${dataPro[i].date}</td>
          <td>${dataPro[i].wilaya}</td>
          <td>${dataPro[i].place1}</td>
          <td>${dataPro[i].place2}</td>
          <td>${dataPro[i].place3}</td>
          <td>${dataPro[i].heure_derpart}</td>
          <td>${dataPro[i].heure_arrive}</td>
          <td>${dataPro[i].category}</td>
          <td><button id="update">update</button></td>
          <td><button onclick="deleteData(${i})" id="delete">delete</button></td>
    
         </tr>
        `
    }
 
    document.getElementById('tbody').innerHTML= tabel;

    let btnDelete= document.getElementById('deleteALL')

    if(dataPro.length>0){

        btnDelete.innerHTML=`<button  onclick=" deleteALL() " > Delete ALL </button> `

    }
    else{
        btnDelete.innerHTML=`   `
    }
}  
showData()


//suprimer un donnes

function deleteData(i){

    dataPro.splice(i,1);
    localStorage.sortie= JSON.stringify(dataPro)
    showData()


}


function deleteALL(){
    
    localStorage.clear()
    dataPro.splace(0)
    showData()
    

}




