<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cijferlijst</title>
    <style>
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
</html>

<?php

function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cijfers";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
}

  function GetData($table) {
  $conn = ConnectDb();

  $querry = $conn->prepare("SELECT * FROM $table");
  $querry->execute();
  $result = $querry->fetchAll();

  
  return $result;

}
function PrintCijfers($result) {
    
    $table = "<table>";
    $table .= "<tr>";

    
    if ($result) {
        foreach ($result[0] as $column => $value) {
            $table .= "<th>" . htmlspecialchars($column) . "</th>";
        }
        $table .= "</tr>";

        
        foreach ($result as $row) {
            $table .= "<tr>";
            foreach ($row as $cell) {
                $table .= "<td>" . htmlspecialchars($cell) . "</td>";
            }
            
        }
        $table .= "</table>";
        echo $table;
    } else {
        echo "No data found.";
    }
    
}
$data = GetData('cijfers'); 
PrintCijfers($data);
?>