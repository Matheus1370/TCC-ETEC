<?php
$host  = "localhost:3306";
	$user  = "root";
	$pass  = "root";
    $base  = "Site";
    $mysqli = new mysqli($host, $user, $pass, $base);

    if($mysqli->error) {
        die("Falha ao conectar ao banco de dados: " . $mysqli->error);
    }