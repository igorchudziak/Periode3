
<?php
include 'connect.php'; 
$db = ConnectDb(); 

// Controleer of er een ID is opgegeven in de URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Bereid een SQL-query voor om de gegevens van de fiets met de opgegeven ID op te halen
    $query = $db->prepare("SELECT * FROM fietsenshop WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    
    if (!$row) {
        echo "Fiets niet gevonden.";
        exit;
    }
} else {
    echo "Geen ID opgegeven.";
    exit;
}

// Controleer of het wijzigingsformulier is ingediend
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $merk = $_POST['merk'];
    $type = $_POST['type'];
    $prijs = $_POST['prijs'];

    
    $query = $db->prepare("UPDATE fietsenshop SET merk = :merk, type = :type, prijs = :prijs WHERE id = :id");
    
    // Bind de formulierwaarden aan de query
    $query->bindParam(':merk', $merk);
    $query->bindParam(':type', $type);
    $query->bindParam(':prijs', $prijs);
    $query->bindParam(':id', $id, PDO::PARAM_INT);

    // Voer de query uit en controleer of het gelukt is
    if ($query->execute()) {
        echo "Fiets succesvol gewijzigd!";
        header("Location: index.php"); // Stuur de gebruiker terug naar de hoofdpagina
        exit;
    } else {
        echo "Fout bij bijwerken."; // Foutmelding bij mislukte update
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Wijzigen Fiets</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h2>Wijzig Fiets</h2>

    <!-- Formulier om fietsgegevens te wijzigen -->
    <form action="wijzigen.php?id=<?php echo $row['id']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>Merk:</label>
        <input type="text" name="merk" value="<?php echo htmlspecialchars($row['merk']); ?>" required><br>

        <label>Type:</label>
        <input type="text" name="type" value="<?php echo htmlspecialchars($row['type']); ?>" required><br>

        <label>Prijs:</label>
        <input type="text" name="prijs" value="<?php echo htmlspecialchars($row['prijs']); ?>" required><br>

        <input type="submit" name="update" value="Opslaan">
    </form>
</body>
</html>
