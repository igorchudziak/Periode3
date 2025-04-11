<?php

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

    $query = "SELECT * FROM cijfers";

    try {
        $stmt = $conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $totaalCijfer = 0;
        $hoogsteCijfer = 0;
        $laagsteCijfer = PHP_INT_MAX; 
        $aantalCijfers = 0;


    if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Leerling</th><th>Cijfers</th></tr>";

    
    foreach ($result as $row) {
        $cijfer = $row['cijfer'];
        $totaalCijfer += $cijfer;
        $hoogsteCijfer = max($hoogsteCijfer, $cijfer);
        $laagsteCijfer = min($laagsteCijfer, $cijfer);
        $aantalCijfers++;

        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['leerling']."</td>";
        echo "<td>".$cijfer."</td>";
        echo "</tr>";
    }

    echo "</table>";

    
    $gemiddeldeCijfer = $totaalCijfer / $aantalCijfers;
    echo "<p>Gemiddelde cijfer: " . round($gemiddeldeCijfer, 1) . "</p>";
    echo "<p>Hoogste cijfer: " . $hoogsteCijfer . "</p>";
    echo "<p>Laagste cijfer: " . $laagsteCijfer . "</p>";

} else {
    echo "Geen resultaten gevonden";
}

} catch (PDOException $e) {
    echo "Query mislukt: " . $e->getMessage();
}

$conn = null;
?>
