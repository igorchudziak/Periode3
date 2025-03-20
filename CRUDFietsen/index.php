<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FietsenShop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <a href="zoeken.php">Zoeken</a><br>
    <a href="invoeren.php">Invoeren</a>

<?php
include 'connect.php';
$db = ConnectDb(); 

// Functie om alle gegevens uit een opgegeven tabel op te halen
function GetData($fietsentable) {
    $conn = ConnectDb(); 
    $query = $conn->prepare("SELECT * FROM $fietsentable");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

// Functie om opgehaalde gegevens in een tabel weer te geven
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
        
        echo "<tr><td colspan='5'>Geen gegevens gevonden.</td></tr>";
    }
    echo "</table>";
}


$data = GetData('fietsenshop'); 
PrintFietsen($data);
?>
<script>
// JavaScript functie om verwijdering te bevestigen
function confirmDelete() {
    return confirm("Weet je zeker dat je het record wilt verwijderen?");
}
</script>
</body>
</html>
