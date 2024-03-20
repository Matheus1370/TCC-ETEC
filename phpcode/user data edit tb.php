<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['nome'];
		$id = $_POST['id'];
		$fone = $_POST['fone'];
        $cpf = $_POST['cpf'];
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE visitante  set nome = ?, fone = ?, cpf = ? WHERE cod = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$fone,$cpf,$id));
		Database::disconnect();
		header("Location: user data.php");
    }
?>