
let attendance       
          
          // add event listener to attendance li element
         attendance = document.getElementById("attendance").addEventListener("click", function() {
            // create table element
            var table = document.createElement("table");
      
            // create header row
            var headerRow = document.createElement("tr");
      
            // create header cells
            var headerCell1 = document.createElement("th");
            headerCell1.textContent = "Name";
            headerRow.appendChild(headerCell1);
      
            var headerCell2 = document.createElement("th");
            headerCell2.textContent = "Age";
            headerRow.appendChild(headerCell2);
      
            // add header row to table
            table.appendChild(headerRow);
      
            // create data rows
            var dataRow1 = document.createElement("tr");
            var dataCell1 = document.createElement("td");
            dataCell1.textContent = "John";
            dataRow1.appendChild(dataCell1);
            var dataCell2 = document.createElement("td");
            dataCell2.textContent = "25";
            dataRow1.appendChild(dataCell2);
      
            var dataRow2 = document.createElement("tr");
            var dataCell3 = document.createElement("td");
            dataCell3.textContent = "Jane";
            dataRow2.appendChild(dataCell3);
            var dataCell4 = document.createElement("td");
            dataCell4.textContent = "30";
            dataRow2.appendChild(dataCell4);
      
            // add data rows to table
            table.appendChild(dataRow1);
            table.appendChild(dataRow2);
      
            // add table to body of document
            document.body.appendChild(table);
          });
        
