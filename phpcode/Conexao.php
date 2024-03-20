<?php
$host  = "localhost";
	$user  = "root";
	$pass  = "";
    $base  = "site";
    $mysqli = new mysqli($host, $user, $pass, $base);

    if($mysqli->error) {
        die("Falha ao conectar ao banco de dados: " . $mysqli->error);
    }