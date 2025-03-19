<?php
include 'connect.php';
$db = ConnectDb();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $query = $db->prepare("DELETE FROM cijfers WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);

    if ($query->execute()) {
        echo "Record is verwijderd";
    } else {
        echo "Er is iets misgegaan";
    }
} else {
    echo "Ongeldige invoer";
}

header("Location: Opdracht12b.php");
exit;
?>