<?php
    session_start();
    $adm = $_SESSION['login'];

    echo "Estamos em um novo arquivo<br>";
    echo "Bem vindos, especialmente você ".$adm."!";
?>