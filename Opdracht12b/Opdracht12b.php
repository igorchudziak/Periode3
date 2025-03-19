<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cijferlijst</title>
    <style>
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td, th {
            padding: 8px;
            text-align: left;
        }
        th {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="zoeken.php">Zoeken</a><br>
    <a href="invoeren.php">Invoeren</a>

<?php
include 'connect.php';
$db = ConnectDb();

function GetData($cijferstable) {
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT * FROM $cijferstable");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

function PrintCijfers($result) {
    echo "<table>";
    echo "<tr>
            <th onclick='sortTable(0)'>Leerling</th>
            <th onclick='sortTable(1)'>Cijfer</th>
            <th onclick='sortTable(2)'>Vak</th>
            <th onclick='sortTable(3)'>Docent</th>
          </tr>";
    
    if ($result) {
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['leerling']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cijfer']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Vak']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Docent']) . "</td>";

            echo "<td><a href='verwijder.php?id=" . $row['id'] . "'onclick='return confirmDelete()'>Verwijder</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found.</td></tr>";
    }
    echo "</table>";
}

$data = GetData('cijfers'); 
PrintCijfers($data);
?>
<script src="app.js"></script>
</body>
</html>
