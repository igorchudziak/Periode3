<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoeken</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<form action="" method="get">
    <label for="search">Fiets zoeken:</label>
    <input type="text" id="search" name="search" value="">
    <input type="submit" value="Zoeken">
    <button type="button" onclick="window.location='index.php';">Reset</button>
</form>

<?php
include 'connect.php'; 
$db = ConnectDb(); 

// Haal de zoekterm op uit de URL, als deze bestaat
$search = $_GET['search'] ?? '';

$query = $db->prepare("SELECT * FROM fietsenshop WHERE merk LIKE :search ORDER BY merk");
$query->bindValue(':search', '%' . $search . '%'); // Voeg de % toe voor het LIKE 

$query->execute(); 
$result = $query->fetchAll(PDO::FETCH_ASSOC);

function GetData($fietsentable) {
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT * FROM $fietsentable");
    $query->execute(); 
    $result = $query->fetchAll();
    return $result;
}

// Functie om de fietsen weer te geven in een tabel
function PrintFietsen($result) {
    echo "<table>";
    echo "<tr>
            <th>Merk</th>
            <th>Type</th>
            <th>Prijs</th>
            <th>Verwijderen</th>
            <th>Wijzigen</th>
          </tr>";
    
    if ($result) {
        // Als er resultaten zijn, toon ze in de tabel
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['merk']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['type']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['prijs']) . "</td>"; 

            echo "<td><a href='verwijder.php?id=" . $row['id'] . "' onclick='return confirmDelete()'>Verwijder</a></td>";
            echo "<td><a href='wijzigen.php?id=" . $row['id'] . "'>Wijzigen</a></td>";
            echo "</tr>";
        }
    } else {
        
        echo "<tr><td colspan='5'>Geen data gevonden.</td></tr>";
    }
    echo "</table>";
}


$data = ($search !== '') ? $result : GetData('fietsenshop'); 
PrintFietsen($data);

?>

<script>

function confirmDelete() {
    return confirm("Weet je zeker dat je het record wilt verwijderen?");
}
</script>

</body>
</html>
