function afficherAccompagner() 
{
    var accompagner = document.getElementById("SIaccompagner");
    var div = document.getElementById("accompagnerChoice");
    var form = document.querySelector(".form");
    if (accompagner.checked) 
    {
        div.style.visibility = 'visible';
        form.style.marginLeft = '-10%';
        form.style.transition = 'margin-left 0.5s ease';
    } 
    else 
    {
        div.style.visibility = 'hidden';
        form.style.marginLeft = '0';
        form.style.transition = 'margin-left 0.5s ease';
    }
}
/**********************************************************************************************************************/
function ajouterUtilisateur(event) 
{
    event.preventDefault();

    var nbr_places_demande = document.getElementById("nbr_places_demande").value;
    var listeUtilisateurs = document.getElementById("listeUtilisateurs");
    
    for (var i = 0; i < nbr_places_demande; i++) 
    {
        var ligne = listeUtilisateurs.insertRow();
        
        var nomCell = ligne.insertCell();
        var prenomCell = ligne.insertCell();
        var dateCell = ligne.insertCell();
        var plus12Cell = ligne.insertCell();
        
        nomCell.innerHTML = '<input type="text" size="20" id="nomPassager'+ i +'" name="nomPassager'+ i +'" placeholder="first name">';
        prenomCell.innerHTML = '<input type="text" size="20" id="prenomPassager'+ i +'" name="prenomPassager'+ i +'" placeholder="last name">';
        dateCell.innerHTML = '<input type="date" id="naissance'+ i +'" name="naissance'+ i +'">';
        plus12Cell.innerHTML = '<input type="checkbox" id="plus12'+ i +'" name="plus12'+ i +'">';
    }
}