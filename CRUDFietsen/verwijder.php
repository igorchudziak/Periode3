<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijder</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>

<?php
include 'connect.php';
$db = ConnectDb();

// Controleer of een geldige 'id' is meegegeven via de URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    
    $query = $db->prepare("DELETE FROM fietsenshop WHERE id = :id");
    
    
    $query->bindParam(':id', $id, PDO::PARAM_INT);

    // Voer de query uit en controleer of het gelukt is
    if ($query->execute()) {
        echo "Record is verwijderd";
    } else {
        echo "Er is iets misgegaan";
    }
} else {
    echo "Ongeldige invoer";
}


header("Location: index.php");
exit;
?>
