<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoeren</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Nieuwe fiets invoeren</h2>

    <!-- Formulier om een nieuwe fiets toe te voegen -->
    <form action="invoeren.php" method="post">
        <label for="merk">Merk:</label>
        <input type="text" id="merk" name="merk" required><br>

        <label for="prijs">Prijs:</label>
        <input type="number" id="prijs" name="prijs" required><br>

        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required><br>

        <input type="submit" value="Toevoegen">
    </form>

</body>
</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connect.php"; 
    $db = ConnectDb();

    // Haal de invoergegevens op en valideer ze
    $merk = htmlspecialchars($_POST['merk']); 
    $prijs = filter_input(INPUT_POST, 'prijs', FILTER_VALIDATE_INT);
    $type = htmlspecialchars($_POST['type']); 

    
    if (!empty($merk) && $prijs !== false && !empty($type)) {

        
        $query = $db->prepare("INSERT INTO fietsenshop (merk, prijs, type) VALUES (:merk, :prijs, :type)");
        
        // Bind de parameters aan de query
        $query->bindParam(':merk', $merk);
        $query->bindParam(':prijs', $prijs);
        $query->bindParam(':type', $type);

        
        if ($query->execute()) {
            echo  "Succes!<br><a href='index.php'>Ga terug</a>"; 
        } else {
            echo "Geen succes."; 
        }
    
    } else {
        echo "Ongeldige invoer."; 
    }
}

?>