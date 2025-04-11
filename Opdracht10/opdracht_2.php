<?php

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

list($browser, $os, $version) = getBrowserAndOS();

echo "Je browser: " . $browser . " (Versie: " . $version . ")<br>";
echo "Je besturingssysteem: " . $os;




?>