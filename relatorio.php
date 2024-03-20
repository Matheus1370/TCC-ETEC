<?php

include('Protect.php');

include('Conexao.php');

$cargo = $_SESSION['cargo'];

$sql_code2 = "SELECT Nm_Funcao FROM Funcao Where Cod_Funcao = $cargo ;";
$sql_query2 = $mysqli->query($sql_code2) or die("Falha na execução do código SQL: " . $mysqli->error);

$usuario2 = $sql_query2->fetch_assoc();

$usuario2['Nm_Funcao'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="css/Dashboard/syle_Dashboard.css">
    <link rel="stylesheet" href="css/graficos.css">

    <!-- Icones utilizados na navbar -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:700,400' rel='stylesheet' type='text/css'>

    <!-- Gráfico -->


    <title>Etec - Dashboard</title>
</head>

<body>
    <?php include_once('_partials/navBar.php'); ?>
    
    <main>
    <div class="comeco">
        <div class="intro">
            <h1>Relatórios</h1>
        </div>
    </div>
        <div class="graf">
            <div id="grafico1">
                <?php include('_partials/grafico1.php'); ?>
            </div>
            <div id="grafico2">
                <?php include('_partials/grafico2.php'); ?>
            </div>
        </div>

        <div id="menores">
            <div id="tabela">
                <a href="listas/lista1.php">Listar Todos</a>
                <?php include('_partials/tabela1.php'); ?>
            </div>

            <div id="tabela">
                <a href="listas/lista2.php">Listar Todos</a>
                <?php include('_partials/tabela2.php'); ?>
            </div>

            <div id="tabela">
                <a href="listas/lista3.php">Listar Todos</a>
                <?php include('_partials/tabela3.php'); ?>
            </div>
        </div>
    </main>

    <?php
    ?>

</body>

</html>