<?php

include('Protect.php');

include('Conexao.php');

$cargo = $_SESSION['cargo'];

$sql_code2 = "SELECT Nm_Funcao FROM Funcao Where Cod_Funcao = $cargo ;";
$sql_query2 = $mysqli->query($sql_code2) or die("Falha na execução do código SQL: " . $mysqli->$error);

$usuario2 = $sql_query2->fetch_assoc();

$usuario2['Nm_Funcao'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Dashboard/syle_Dashboard.css">
    <link rel="stylesheet" href="css/Dashboard/ranking.css">
    <link rel="stylesheet" href="css/Dashboard/Responsividade/resp_rank.css">

    <title>Ranking dos Alunos</title>
</head>

<body>
    <?php include('_partials/navBar.php'); ?>
    <div id="tudo">
        <div class="intro">
            <div class="titulo">
                <h1>Ranking de Frequências</h1>
            </div>
        </div>

        <div class="procura">
            <?php include('_partials/selects.php'); ?>
        </div>


        <?php
        if (!isset($_POST['turma'])) {
        ?>
            <?php
            $res = mysqli_query($mysqli, "SELECT * FROM alunos ORDER BY frequencia DESC LIMIT 10");
            ?>
            <br>

            <div class="tabelinha">
                <div id="principal">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Frequência</th>
                                <th>Turma</th>
                                <th>Período</th>
                            </tr>
                        </thead>
                        <?php
                        while ($busca = $res->fetch_assoc()) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $busca['nome']; ?></td>
                                    <td><?php echo $busca['frequencia']; ?></td>
                                    <td><?php echo $busca['turma']; ?></td>
                                    <td><?php echo $busca['periodo']; ?></td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <?php
            }
            if (isset($_POST['turma'])) {
                $turma = $_POST['button1'];
                $periodo = $_POST['button2'];
                if ($turma == 'adm' && $periodo == 'todos' || $turma == 'adm' && $periodo == '') {
                    $res2 = mysqli_query($mysqli, "SELECT * FROM alunos WHERE turma = 'ADM' ORDER BY frequencia DESC LIMIT 10");
                ?>
                    <div id="principal">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Frequência</th>
                                    <th>Turma</th>
                                    <th>Período</th>
                                </tr>
                            </thead>
                            <?php
                            while ($busca2 = $res2->fetch_assoc()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $busca2['nome']; ?></td>
                                        <td><?php echo $busca2['frequencia']; ?></td>
                                        <td><?php echo $busca2['turma']; ?></td>
                                        <td><?php echo $busca2['periodo']; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                <?php
                } else if ($turma == 'ds' && $periodo == 'todos' || $turma == 'ds' && $periodo == '') {
                    $res3 = mysqli_query($mysqli, "SELECT * FROM alunos WHERE turma = 'DS' ORDER BY frequencia DESC LIMIT 10");
                ?>
                    <div id="principal">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Frequência</th>
                                    <th>Turma</th>
                                    <th>Período</th>
                                </tr>
                            </thead>
                            <?php
                            while ($busca3 = $res3->fetch_assoc()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $busca3['nome']; ?></td>
                                        <td><?php echo $busca3['frequencia']; ?></td>
                                        <td><?php echo $busca3['turma']; ?></td>
                                        <td><?php echo $busca3['periodo']; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                <?php
                } elseif ($turma == '' && $periodo == 'manha') {
                    $res4 = mysqli_query($mysqli, "SELECT * FROM alunos WHERE periodo = 'Manhã' ORDER BY frequencia DESC LIMIT 10");
                ?>
                    <div id="principal">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Frequência</th>
                                    <th>Turma</th>
                                    <th>Período</th>
                                </tr>
                            </thead>
                            <?php
                            while ($busca4 = $res4->fetch_assoc()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $busca4['nome']; ?></td>
                                        <td><?php echo $busca4['frequencia']; ?></td>
                                        <td><?php echo $busca4['turma']; ?></td>
                                        <td><?php echo $busca4['periodo']; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                <?php
                } elseif ($turma == '' && $periodo == 'noite') {
                    $res4 = mysqli_query($mysqli, "SELECT * FROM alunos WHERE periodo = 'Noite' ORDER BY frequencia DESC LIMIT 10");
                ?>
                    <div id="principal">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Frequência</th>
                                    <th>Turma</th>
                                    <th>Período</th>
                                </tr>
                            </thead>
                            <?php
                            while ($busca4 = $res4->fetch_assoc()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $busca4['nome']; ?></td>
                                        <td><?php echo $busca4['frequencia']; ?></td>
                                        <td><?php echo $busca4['turma']; ?></td>
                                        <td><?php echo $busca4['periodo']; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                <?php
                } elseif ($turma == 'adm' && $periodo == 'manha') {
                    $res4 = mysqli_query($mysqli, "SELECT * FROM alunos WHERE turma = 'ADM' and periodo = 'Manhã' ORDER BY frequencia DESC LIMIT 10");
                ?>
                    <div id="principal">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Frequência</th>
                                    <th>Turma</th>
                                    <th>Período</th>
                                </tr>
                            </thead>
                            <?php
                            while ($busca4 = $res4->fetch_assoc()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $busca4['nome']; ?></td>
                                        <td><?php echo $busca4['frequencia']; ?></td>
                                        <td><?php echo $busca4['turma']; ?></td>
                                        <td><?php echo $busca4['periodo']; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                <?php
                } elseif ($turma == 'adm' && $periodo == 'noite') {
                    $res4 = mysqli_query($mysqli, "SELECT * FROM alunos WHERE turma = 'ADM' and periodo = 'Noite' ORDER BY frequencia DESC LIMIT 10");
                ?>
                    <div id="principal">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Frequência</th>
                                    <th>Turma</th>
                                    <th>Período</th>
                                </tr>
                            </thead>
                            <?php
                            while ($busca4 = $res4->fetch_assoc()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $busca4['nome']; ?></td>
                                        <td><?php echo $busca4['frequencia']; ?></td>
                                        <td><?php echo $busca4['turma']; ?></td>
                                        <td><?php echo $busca4['periodo']; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                <?php
                } elseif ($turma == 'ds' && $periodo == 'manha') {
                    $res4 = mysqli_query($mysqli, "SELECT * FROM alunos WHERE turma = 'DS' and periodo = 'Manhã' ORDER BY frequencia DESC LIMIT 10");
                ?>
                    <div id="principal">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Frequência</th>
                                    <th>Turma</th>
                                    <th>Período</th>
                                </tr>
                            </thead>
                            <?php
                            while ($busca4 = $res4->fetch_assoc()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $busca4['nome']; ?></td>
                                        <td><?php echo $busca4['frequencia']; ?></td>
                                        <td><?php echo $busca4['turma']; ?></td>
                                        <td><?php echo $busca4['periodo']; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                <?php
                } elseif ($turma == 'ds' && $periodo == 'noite') {
                    $res4 = mysqli_query($mysqli, "SELECT * FROM alunos WHERE turma = 'DS' and periodo = 'Noite' ORDER BY frequencia DESC LIMIT 10");
                ?>
                    <div id="principal">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Frequência</th>
                                    <th>Turma</th>
                                    <th>Período</th>
                                </tr>
                            </thead>
                            <?php
                            while ($busca4 = $res4->fetch_assoc()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $busca4['nome']; ?></td>
                                        <td><?php echo $busca4['frequencia']; ?></td>
                                        <td><?php echo $busca4['turma']; ?></td>
                                        <td><?php echo $busca4['periodo']; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                <?php
                } elseif ($turma == 'todas' && $periodo == 'todos' or $turma == '' && $periodo == '' or $turma == 'todas' && $periodo == '' or $turma == '' && $periodo == 'todos') {
                    $res = mysqli_query($mysqli, "SELECT * FROM alunos ORDER BY frequencia DESC LIMIT 10");
                ?>
                    <div id="principal">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Frequência</th>
                                    <th>Turma</th>
                                    <th>Período</th>
                                </tr>
                            </thead>
                            <?php
                            while ($busca = $res->fetch_assoc()) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $busca['nome']; ?></td>
                                        <td><?php echo $busca['frequencia']; ?></td>
                                        <td><?php echo $busca['turma']; ?></td>
                                        <td><?php echo $busca['periodo']; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
            <?php
                } else {
                }
            }
            ?>
            </div>
    </div>
</body>

</html>