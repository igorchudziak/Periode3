<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoeken</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            cursor: pointer;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
<form action="" method="get">

    <label for="search">Zoek leerling:</label>
    <input type="text" id="search" name="search" value="">
    <input type="submit" value="Zoeken">
    <button type="button" onclick="window.location='Opdracht12b.php';">Reset</button>
</form>

<?php
include 'connect.php';
$db = ConnectDb();

$search = $_GET['search'] ?? '';
$query = $db->prepare("SELECT * FROM cijfers WHERE leerling LIKE :search ORDER BY leerling");

$query->bindValue(':search', '%' . $search . '%');

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

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

$data = ($search !== '') ? $result : GetData('cijfers'); 
PrintCijfers($data);

?>
<script src="app.js"></script>


</body>
</html>