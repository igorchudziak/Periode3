function confirmDelete() {
    return confirm("Weet je zeker dat je het record wilt verwijderen?");
}

function sortTable(column) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.querySelector("table");
    switching = true;
    dir = "asc";

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < rows.length - 1; i++) {
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("TD")[column].innerHTML.trim();
            y = rows[i + 1].getElementsByTagName("TD")[column].innerHTML.trim();

            let xValue = isNaN(x) ? x.toLowerCase() : parseFloat(x);
            let yValue = isNaN(y) ? y.toLowerCase() : parseFloat(y);

            if ((dir == "asc" && xValue > yValue) || (dir =="desc" && xValue < yValue)) {
                shouldSwitch = true;
                break;
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
        }
    }
}

