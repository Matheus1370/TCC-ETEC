<?php

include('../Protect.php');

include('../Conexao.php');

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/Dashboard/syle_Dashboard.css">
    <link rel="stylesheet" href="../css/Dashboard/style_home.css">
    <link rel="stylesheet" href="../css/graficos.css">

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
    <?php include('../_partials/navBar2.php') ?>

    <main>
        <?php
        if(isset($_POST['nome'])){
            $nome = $_POST['nome'];
            $res = $mysqli->query("SELECT * FROM validacao WHERE Status = 'Ativado'");
            ?>
            <div id="meio">
                <form action="" method="post" class="forms">
                    <input type="text" name="nome" id="" placeholder="Digite o nome">
                    <input type="submit" name="listar1" value="Buscar" class="button">
                </form>
                <table border="1" cellpadding="10" class="consulta consulta1">
                    <thead>
                        <tr><th colspan='4' class="first">Está no campus</th></tr>
                        <tr>
                            <th>Cartão</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Fone</th>
                        </tr>
                        <tbody>
                            <?php
                            while($arq = $res->fetch_assoc()){
                                if($arq['CodPessoa'] != 0 && $arq['CodAluno'] == 0 && $arq['CodVisitante'] == 0){
                                    $codFun = $arq['CodPessoa'];
                                    $res12 = mysqli_query($mysqli,"SELECT * FROM pessoa where CodPessoa = '$codFun' and Nome like '%$nome%'");
                                    $arq4 = $res12->fetch_assoc();
                                    $nome = $arq4['Nome'];
                                    $fone = $arq4['Fone'];
                                    $cpf = $arq4['CPF'];
                                }
                                elseif($arq['CodPessoa'] == 0 && $arq['CodAluno'] != 0 && $arq['CodVisitante'] == 0){
                                    $codAluno = $arq['CodAluno'];
                                    $res12 = mysqli_query($mysqli,"SELECT * FROM alunos where cod = '$codAluno' and nome like '%$nome%'");
                                    $arq4 = $res12->fetch_assoc();
                                    $nome = $arq4['nome'];
                                    $fone = $arq4['fone'];
                                    $cpf = $arq4['cpf'];
                                }else{
                                    $codVisit = $arq['CodVisitante'];
                                    $res12 = mysqli_query($mysqli,"SELECT * FROM visitante where cod = '$codVisit' and nome like '%$nome%'");
                                    $arq4 = $res12->fetch_assoc();
                                    $nome = $arq4['nome'];
                                    $fone = $arq4['fone'];
                                    $cpf = $arq4['cpf'];
                                }
                            ?>
                                <tr>
                                    <td><?php echo $arq['Id_Cartao'];?></td>
                                    <td><?php echo $nome;?></td>
                                    <td><?php echo $cpf;?></td>
                                    <td><?php echo $fone;?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </thead>
                </table>
            </div>
            <?php
        }else{
            $res = $mysqli->query("SELECT * FROM validacao WHERE Status = 'Ativado'");
            ?>
            <div id="meio">
                <form action="" method="post" class="forms">
                    <input type="text" name="nome" id="" placeholder="Digite o nome">
                    <input type="submit" name="listar1" value="buscar" class="button">
                </form>
                <table border="1" cellpadding="10" class="consulta consulta1">
                    <thead>
                        <tr><th colspan='4' class="first">Está no campus</th></tr>
                        <tr>
                            <th>Cartão</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Fone</th>
                        </tr>
                        <tbody>
                            <?php
                            while($arq = $res->fetch_assoc()){
                                if($arq['CodPessoa'] != 0 && $arq['CodAluno'] == 0 && $arq['CodVisitante'] == 0){
                                    $codFun = $arq['CodPessoa'];
                                    $res12 = mysqli_query($mysqli,"SELECT * FROM pessoa where CodPessoa = '$codFun'");
                                    $arq4 = $res12->fetch_assoc();
                                    $nome = $arq4['Nome'];
                                    $fone = $arq4['Fone'];
                                    $cpf = $arq4['CPF'];
                                }
                                elseif($arq['CodPessoa'] == 0 && $arq['CodAluno'] != 0 && $arq['CodVisitante'] == 0){
                                    $codAluno = $arq['CodAluno'];
                                    $res12 = mysqli_query($mysqli,"SELECT * FROM alunos where cod = '$codAluno'");
                                    $arq4 = $res12->fetch_assoc();
                                    $nome = $arq4['nome'];
                                    $fone = $arq4['fone'];
                                    $cpf = $arq4['cpf'];
                                }else{
                                    $codVisit = $arq['CodVisitante'];
                                    $res12 = mysqli_query($mysqli,"SELECT * FROM visitante where cod = '$codVisit'");
                                    $arq4 = $res12->fetch_assoc();
                                    $nome = $arq4['nome'];
                                    $fone = $arq4['fone'];
                                    $cpf = $arq4['cpf'];
                                }
                            ?>
                                <tr>
                                    <td><?php echo $arq['Id_Cartao'];?></td>
                                    <td><?php echo $nome;?></td>
                                    <td><?php echo $cpf;?></td>
                                    <td><?php echo $fone;?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </thead>
                </table>
            </div>
            <?php
        }
        ?>
    </main>

</body>

</html>