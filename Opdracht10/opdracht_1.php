<?php

password(10);

    function password($l) {

        $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        for ($i = 0; $i < $l; $i++) {

            $n = rand(0, strlen($alphabet)-1);

            $pass[$i] = $alphabet[$n];
        }

        echo "Willekeurig wachtword van $l tekens: " . implode($pass);

    }



?>