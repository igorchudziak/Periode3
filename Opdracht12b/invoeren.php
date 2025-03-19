<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connect.php";
    $db = ConnectDb();

    $leerling = htmlspecialchars($_POST['leerling']);
    $cijfer = filter_input(INPUT_POST, 'cijfer', FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 12]]);
    $vak = htmlspecialchars($_POST['Vak']);
    $docent = htmlspecialchars($_POST['Docent']);

    if ($leerling !== false && $cijfer !== false && $vak !== false && $docent !== false) {

    $query = $db->prepare("INSERT INTO cijfers (leerling, cijfer, Vak, Docent) VALUES (:leerling, :cijfer, :Vak, :Docent)");
        
        $query->bindParam(':leerling', $leerling);
        $query->bindParam(':cijfer', $cijfer);
        $query->bindParam(':Vak', $vak);
        $query->bindParam(':Docent', $docent);

        if ($query->execute()) {
            echo  "Succes!<br><a href='Opdracht12b.php'>Ga terug</a>";
        } else {
            echo "Geen succes.";
        }
    
    } else {
        echo "Ongeldige invoer.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoeren</title>
</head>
<body>
    <h2>Nieuwe cijfer invoeren</h2>

    <form action="invoeren.php" method="post">
        <label for="leerling">Leerling:</label>
        <input type="text" id="leerling" name="leerling" required><br>

        <label for="cijfer">Cijfers:</label>
        <input type="number" id="cijfer" name="cijfer" min="1" max="12" required><br>

        <label for="Vak">Vak:</label>
        <input type="text" id="Vak" name="Vak" required><br>

        <label for="Docent">Docent:</label>
        <input type="text" id="Docent" name="Docent" required><br>

        <input type="submit" value="Toevoegen">
    </form>

</body>
</html>








