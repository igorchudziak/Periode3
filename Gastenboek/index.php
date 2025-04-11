<h1>Opdracht 6 hoofdstuk 9: gastenboek</h1>
<form action="" method="post">
    Naam: <input type="text" name="naam" id="naam"></input></br></br>
    Bericht: <textarea type="text" name="bericht" id="bericht"></textarea></br></br>
    <input type="submit" name="knop" id="knop">
</form>

<?php
include "connect.php";

try {
    $stmt = $conn->prepare("INSERT INTO berichten(naam, bericht, datumtijd)
    VALUES (:naam, :bericht, :datumtijd)");
    $stmt->bindparam(':naam', $naam);
    $stmt->bindparam(':bericht', $bericht);
    $stmt->bindparam(':datumtijd', $datumtijd);

if (isset($_REQUEST['naam'])) {
    $naam = $_POST['naam'];
    $bericht = $_POST['bericht'];
    $datumtijd = Date('d-m-Y');
    $stmt->execute();

    header('Location: index.php');
}} 
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

    $sqlSelect = "SELECT * from berichten";
$data = $conn->query($sqlSelect);

foreach ($data as $row) {
    echo $row['id']." ";
    echo $row['datumtijd']." ";
    echo $row['naam']." ";
    echo $row['bericht']." ";
    echo "<a href='VerwijderBericht.php?id=$row[id]'>Verwijderen</a>";
    echo "</br>";
}



?>