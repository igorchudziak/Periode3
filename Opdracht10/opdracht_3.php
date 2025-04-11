<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "browser";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

function getBrowserAndOS() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "Onbekend";
    $os = "Onbekend";
    $version = "Onbekende versie";

    if (preg_match('/Edg\/(\d+)/', $userAgent, $matches)) {
        $browser = "Microsoft Edge";
        $version = $matches[1];
    } elseif (preg_match('/Chrome\/(\d+)/', $userAgent, $matches)) {
        $browser = "Chrome";
        $version = $matches[1];
    } elseif (preg_match('/Firefox\/(\d+)/', $userAgent, $matches)) {
        $browser = "Firefox";
        $version = $matches[1];
    } elseif (preg_match('/Opera|OPR\/(\d+)/', $userAgent, $matches)) {
        $browser = "Opera";
        $version = $matches[1] ?? '';
    } elseif (preg_match('/Safari\/(\d+)/', $userAgent, $matches) && !preg_match('/Chrome/', $userAgent)) {
        $browser = "Safari";
        preg_match('/Version\/(\d+)/', $userAgent, $matches);
        $version = $matches[1];
    } elseif (preg_match('/MSIE (\d+)/', $userAgent, $matches) || preg_match('/Trident\/.*; rv:(\d+)/', $userAgent, $matches)) {
        $browser = "Internet Explorer";
        $version = $matches[1];
    }

    if (preg_match('/linux/i', $userAgent)) {
        $os = "Linux";
    } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
        $os = "Mac";
    } elseif (preg_match('/windows|win32/i', $userAgent)) {
        $os = "Windows";
    }

    return [$browser, $os, $version];
}

function insertVisit($pdo, $browser, $os) {
    $stmt = $pdo->prepare("INSERT INTO visits (browser, os) VALUES (?, ?)");
    $stmt->execute([$browser, $os]);
}

list($browser, $os, $version) = getBrowserAndOS();

echo "Je browser: " . $browser . " (Versie: " . $version . ")<br>";
echo "Je besturingssysteem: " . $os . "<br>";

insertVisit($conn, $browser, $os);

?>
