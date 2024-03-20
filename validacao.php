<?php

include('Protect.php');
include('Conexao.php');

$cargo = $_SESSION['cargo'];

if($cargo == '1'){
    header('Location: master/Dashboard.php');
}

?>