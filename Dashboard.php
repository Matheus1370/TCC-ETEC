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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="css/Dashboard/syle_Dashboard.css">
    <link rel="stylesheet" href="css/Dashboard/style_home.css">
    <link rel="stylesheet" href="css/Dashboard/cal.css">
    <link rel="stylesheet" href="css/Dashboard/Responsividade/resp_home.css">
    <link rel="stylesheet" href="css/Dashboard/Responsividade/resp_nav.css">


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
    <?php include('_partials/navBar.php') ?>

    <main>
        <div class="container1">
            <div class="welcome">
                <div class="wel1">
                    Bem-Vindo <?php echo $_SESSION['nome']; ?>!
                </div>

                <div class="wel2">
                    Tenha um ótimo dia!
                </div>
            </div>

            <div class="intro">
                <h1>
                    Plataforma de Controle
                </h1>
            </div>

            <div class="media">
                <img src="css/Dashboard/img/Ilustration.svg">
            </div>

            <div class="dados">
                <div class="quad">
                    <div class="num-quad">
                        5000
                    </div>

                    <div class="desc-quad">
                        Alunos
                    </div>
                </div>

                <div class="quad">
                    <div class="num-quad">
                        100
                    </div>

                    <div class="desc-quad">
                        Professores
                    </div>
                </div>

                <div class="quad">
                    <div class="num-quad">
                        500
                    </div>

                    <div class="desc-quad">
                        Funcionários
                    </div>
                </div>
            </div>


        </div>

        <!-- ----------------------------------------------------------------------------- -->

        <div class="container2">
            <div class="light">
                <div class="calendar">
                    <div class="calendar-header">
                        <span class="month-picker" id="month-picker">February</span>
                        <div class="year-picker">
                            <span class="year-change" id="prev-year">
                                <pre><</pre>
                            </span>
                            <span id="year">2021</span>
                            <span class="year-change" id="next-year">
                                <pre>></pre>
                            </span>
                        </div>
                    </div>
                    <div class="calendar-body">
                        <div class="calendar-week-day">
                            <div>Dom</div>
                            <div>Seg</div>
                            <div>Ter</div>
                            <div>Qua</div>
                            <div>Qui</div>
                            <div>Sex</div>
                            <div>Sab</div>
                        </div>
                        <div class="calendar-days"></div>
                    </div>
                    <div class="month-list"></div>
                </div>
            </div>

            <?php
            $res = mysqli_query($mysqli, "SELECT * FROM alunos ORDER BY frequencia DESC LIMIT 3");
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
            </div>
        </div>
    </main>

    <script src="js/cal.js"></script>
    <script src="js/script1.js"></script>
</body>

</html>