function searchBooks() {

    let search = document.getElementById("search").value;
    let table = document.getElementById("book-table");
    
    for (let i = table.rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }
    
    
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../controller/get-book.php?title=' + search, true);
    xhttp.send();
    
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = JSON.parse(this.responseText);
            if (result.length > 0) {
                result.forEach(data => {
                    addRow(table, data);
                });
            }
            else{
                let newRow = table.insertRow(table.rows.length);
                newRow.innerHTML = '<tr><td colspan=3 align=\"center\">No Posts Available</td></tr>';
            }
        }
    }
    }
    
    
function addRow(table, rowdata) {
    console.log(rowdata)
    let newRow = table.insertRow(table.rows.length);
    let cell1 = newRow.insertCell(0);
    let cell2 = newRow.insertCell(1);
    let cell3 = newRow.insertCell(2);

    cell1.innerHTML = `<td>${rowdata.BookTitle}</td>`;
    cell2.innerHTML = `<td>${rowdata.Author}</td>`;
    cell3.innerHTML = `<td><a href="book-page.php?id=${rowdata.BookID}">Read Online</a></td>`;

}