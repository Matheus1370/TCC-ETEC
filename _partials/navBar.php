
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Dashboard/syle_Dashboard.css">
    <link rel="stylesheet" href="css/Dashboard/cal.css">

<!-- Icones utilizados na navbar -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:700,400' rel='stylesheet' type='text/css'>

    <title>Document</title>
</head>
<body>
<nav>
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="#">
                        <img src="<?php echo $_SESSION['path']; ?>" alt="Perfil">
                    </a>
                </span>

                <div class="text logo-text">
                    <a href="#">

                        <span class="name"><?php echo $_SESSION['nome']; ?></span>

                        <span class="profession"><?php echo $usuario2['Nm_Funcao']; ?></span>
                    </a>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul>
                    <li class="item">
                        <!-- Inicio -->
                        <a href="Dashboard.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="nav_name">Início</span>
                        </a>
                    </li>
                    <li class="item">
                        <!-- Alunos -->
                        <a href="aluno.php">
                            <span class="icon">
                                <ion-icon name="people-circle-outline"></ion-icon>
                            </span>
                            <span class="nav_name">Colaboradores</span>
                        </a>
                    </li>
                    <li class="item">
                        <!-- Relatórios -->
                        <a href="relatorio.php">
                            <span class="icon">
                                <ion-icon name="pie-chart-outline"></ion-icon>
                            </span>
                            <span class="nav_name">Relatórios</span>
                        </a>
                    </li>
                    <li class="item">
                        <!-- Cadastrar -->
                        <a href="Cad_Fun1.php">
                            <span class="icon">
                                <ion-icon name="add-outline"></ion-icon>
                            </span>
                            <span class="nav_name">Cadastrar</span>
                        </a>
                    </li>
                    <li class="item">
                        <!-- Chamada -->
                        <a href="ranking.php">
                            <span class="icon">
                                <ion-icon name="ribbon-outline"></ion-icon>                            </span>
                            </span>
                            <span class="nav_name">Ranking</span>
                        </a>
                    </li>
                </ul>
                <ul class="logout">
                    <li class="item">
                        <!-- Logout -->
                        <a href="Sair.php">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="nav_name" id="logout">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>