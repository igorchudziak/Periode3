<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "$id";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM berichten WHERE id = '$id'";

        $conn->exec($sql);
        echo "Record is verwijderd";
        header('Location: index.php');
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}




?>