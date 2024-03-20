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
    <link rel="stylesheet" href="css/Dashboard/syle_Dashboard.css">
    <link rel="stylesheet" href="css/Dashboard/aluno.css">
    <title>Alunos</title>
</head>

<body>
    <?php include('_partials/navBar.php'); ?>
    <main>
        <?php
        //////////////////////////////////////////////// BUSCAR PELO NOME /////////////////////////////////////////////////////
        if (isset($_POST['busca1'])) {
            $nome = $_POST['txtbsc1'];
            $select = $mysqli->query("SELECT * FROM pessoa WHERE Cod_Funcao = 1 and nome like '%$nome%'") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Master</h1>
                </div>
            </div>
            <div id="tudo">
                <form action="" method="post" class="pesquisar">
                    <div class="search">
                        <input type="text" placeholder="Procurar..." autocomplete="off" name="txtbsc1" id="">
                        <input type="submit" name="busca1" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner">
                        <img src="<?php echo $lista['path']; ?>"><br>
                        <div class="info">
                            <label id="func">Master</label><br>

                            <label id="nome"><?php echo $lista['Nome']; ?></label><br>
                            <label>CPF: <?php echo $lista['CPF']; ?></label><br>
                            <label><?php echo $lista['Email']; ?></label><br>
                            <label><?php echo date("d/m/Y", strtotime($lista['DataNasc'])); ?></label><br>
                            <label><?php echo $lista['Fone']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (isset($_POST['busca2'])) {
            $nome = $_POST['txtbsc2'];
            $select = $mysqli->query("SELECT * FROM pessoa WHERE Cod_Funcao = 2 and nome like '%$nome%'") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Coordenadores</h1>
                </div>
            </div>
            <div id="tudo">
                <form action="" method="post" class="pesquisar">
                    <div class="search">
                        <input type="text" placeholder="Procurar..." autocomplete="off" name="txtbsc2" id="">
                        <input type="submit" name="busca2" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner">
                        <img src="<?php echo $lista['path']; ?>"><br>
                        <div class="info">
                            <label id="func">Coordenador(a)</label><br>

                            <label id="nome"><?php echo $lista['Nome']; ?></label><br>
                            <label>CPF: <?php echo $lista['CPF']; ?></label><br>
                            <label><?php echo $lista['Email']; ?></label><br>
                            <label><?php echo date("d/m/Y", strtotime($lista['DataNasc'])); ?></label><br>
                            <label><?php echo $lista['Fone']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (isset($_POST['busca3'])) {
            $nome = $_POST['txtbsc3'];
            $select = $mysqli->query("SELECT * FROM pessoa WHERE Cod_Funcao = 3 and like '%$nome%'") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Secretários</h1>
                </div>
            </div>
            <div id="tudo">
                <form action="" method="post" class="pesquisar">
                    <div class="search">
                        <input type="text" placeholder="Procurar..." autocomplete="off" name="txtbsc3" id="">
                        <input type="submit" name="busca3" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner">
                        <img src="<?php echo $lista['path']; ?>"><br>
                        <div class="info">
                            <label id="func">Secretário(a)</label><br>

                            <label id="nome"><?php echo $lista['Nome']; ?></label><br>
                            <label><?php echo $lista['CPF']; ?></label><br>
                            <label><?php echo $lista['Email']; ?></label><br>
                            <label><?php echo date("d/m/Y", strtotime($lista['DataNasc'])); ?></label><br>
                            <label><?php echo $lista['Fone']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (isset($_POST['busca4'])) {
            $nome = $_POST['txtbsc4'];
            $select = $mysqli->query("SELECT * FROM pessoa WHERE Cod_Funcao = 4 and nome like '%$nome%'") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Professores</h1>
                </div>
            </div>
            <div id="tudo">
                <form action="" method="post" class="pesquisar">
                    <div class="search">
                        <input type="text" placeholder="Procurar..." autocomplete="off" name="txtbsc4" id="">
                        <input type="submit" name="busca4" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner">
                        <img src="<?php echo $lista['path']; ?>"><br>
                        <div class="info">
                            <label id="func">Professor(a)</label><br>

                            <label id="nome"><?php echo $lista['Nome']; ?></label><br>
                            <label><?php echo $lista['CPF']; ?></label><br>
                            <label><?php echo $lista['Email']; ?></label><br>
                            <label><?php echo date("d/m/Y", strtotime($lista['DataNasc'])); ?></label><br>
                            <label><?php echo $lista['Fone']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (isset($_POST['busca5'])) {
            $nome = $_POST['txtbsc5'];
            $select = $mysqli->query("SELECT * FROM pessoa WHERE Cod_Funcao = 5 and nome like '%$nome%'") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Funcionários</h1>
                </div>
            </div>
            <div id="tudo">
                <form action="" method="post" class="pesquisar">
                    <div class="search">
                        <input type="text" placeholder="Procurar..." autocomplete="off" name="txtbsc5" id="">
                        <input type="submit" name="busca5" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner">
                        <img src="<?php echo $lista['path']; ?>"><br>
                        <div class="info">
                            <label id="func">Funcionário(a)</label><br>

                            <label id="nome"><?php echo $lista['Nome']; ?></label><br>
                            <label><?php echo $lista['CPF']; ?></label><br>
                            <label><?php echo $lista['Email']; ?></label><br>
                            <label><?php echo date("d/m/Y", strtotime($lista['DataNasc'])); ?></label><br>
                            <label><?php echo $lista['Fone']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (isset($_POST['busca6'])) {
            $nome = $_POST['txtbsc6'];
            $select = $mysqli->query("SELECT * FROM alunos WHERE nome like '%$nome%'") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Alunos</h1>
                </div>
            </div>
            <div id="tudo" class="tudo-aluno">
                <form action="" method="post" class="pesquisar">
                    <div class="search" id="search-aluno">
                        <input type="text" placeholder="Procurar..." autocomplete="off" name="txtbsc6" id="">
                        <input type="submit" name="busca6" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner-aluno">
                        <div class="info-aluno">
                            <label><?php echo $lista['cod']; ?></label><br>
                            <label id="func">Aluno</label><br>
                            <label><?php echo $lista['nome']; ?></label><br>
                            <label><?php echo $lista['turma']; ?></label><br>
                            <label><?php echo $lista['periodo']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>























        <?php
        } elseif (isset($_POST['vis1']) or isset($_POST['voltar2'])) {
            //////////////////////////////////////////////// QUANDO ESCOLHE UMA DAS OPÇÕES DO INICIO /////////////////////////////////////////////////////
            $select = $mysqli->query("SELECT * FROM pessoa WHERE Cod_Funcao = 1") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Master</h1>
                </div>
            </div>


            <div id="tudo">
                <form action="" method="post" class="pesquisar">
                    <div class="search">
                        <input type="text" autocomplete="off" name="txtbsc1" id="" placeholder="Procurar...">
                        <input type="submit" name="busca1" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner">
                        <img src="<?php echo $lista['path']; ?>"><br>
                        <div class="info">
                            <label id="func">Master</label><br>

                            <label id="nome"><?php echo $lista['Nome']; ?></label><br>
                            <label>CPF: <?php echo $lista['CPF']; ?></label><br>
                            <label><?php echo $lista['Email']; ?></label><br>
                            <label><?php echo date("d/m/Y", strtotime($lista['DataNasc'])); ?></label><br>
                            <label><?php echo $lista['Fone']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (isset($_POST['vis2']) or isset($_POST['voltar3'])) {
            $select = $mysqli->query("SELECT * FROM pessoa WHERE Cod_Funcao = 2") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Coordenadores</h1>
                </div>
            </div>
            <div id="tudo">
                <form action="" method="post" class="pesquisar">
                    <div class="search">
                        <input type="text" autocomplete="off" name="txtbsc2" id="">
                        <input type="submit" name="busca2" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <div class="banner">
                        <img src="<?php echo $lista['path']; ?>"><br>
                        <div class="info">
                            <label id="func">Coordenador(a)</label><br>
                            <label id="nome"><?php echo $lista['Nome']; ?></label><br>
                            <label>CPF: <?php echo $lista['CPF']; ?></label><br>
                            <label><?php echo $lista['Email']; ?></label><br>
                            <label><?php echo date("d/m/Y", strtotime($lista['DataNasc'])); ?></label><br>
                            <label><?php echo $lista['Fone']; ?></label>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (isset($_POST['vis3']) or isset($_POST['voltar4'])) {
            $select = $mysqli->query("SELECT * FROM pessoa WHERE Cod_Funcao = 3") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Secretários</h1>
                </div>
            </div>
            <div id="tudo">
                <form action="" method="post" class="pesquisar">
                    <div class="search">
                        <input type="text" autocomplete="off" name="txtbsc3" id="">
                        <input type="submit" name="busca3" value="Buscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner">
                        <img src="<?php echo $lista['path']; ?>"><br>
                        <div class="info">
                            <label id="func">Secretário(a)</label><br>

                            <label id="nome"><?php echo $lista['Nome']; ?></label><br>
                            <label>CPF: <?php echo $lista['CPF']; ?></label><br>
                            <label><?php echo $lista['Email']; ?></label><br>
                            <label><?php echo date("d/m/Y", strtotime($lista['DataNasc'])); ?></label><br>
                            <label><?php echo $lista['Fone']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (isset($_POST['vis4']) or isset($_POST['voltar5'])) {
            $select = $mysqli->query("SELECT * FROM pessoa WHERE Cod_Funcao = 4") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Professores</h1>
                </div>
            </div>
            <div id="tudo">
                <form action="" method="post" class="pesquisar">
                    <div class="search">
                        <input type="text" autocomplete="off" name="txtbsc4" id="">
                        <input type="submit" name="busca4" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner">
                        <img src="<?php echo $lista['path']; ?>"><br>
                        <div class="info">
                            <label id="func">Professor(a)</label><br>

                            <label id="nome"><?php echo $lista['Nome']; ?></label><br>
                            <label>CPF: <?php echo $lista['CPF']; ?></label><br>
                            <label><?php echo $lista['Email']; ?></label><br>
                            <label><?php echo date("d/m/Y", strtotime($lista['DataNasc'])); ?></label><br>
                            <label><?php echo $lista['Fone']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (isset($_POST['vis5']) or isset($_POST['voltar6'])) {
            $select = $mysqli->query("SELECT * FROM pessoa WHERE Cod_Funcao = 5") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Funcionários</h1>
                </div>
            </div>
            <div id="tudo">
                <form action="" method="post" class="pesquisar">
                    <div class="search" id="search-aluno">
                        <input type="text" autocomplete="off" name="txtbsc5" id="">
                        <input type="submit" name="busca5" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner">
                        <img src="<?php echo $lista['path']; ?>"><br>
                        <div class="info">
                            <label id="func">Funcionário(a)</label><br>

                            <label id="nome"><?php echo $lista['Nome']; ?></label><br>
                            <label>CPF: <?php echo $lista['CPF']; ?></label><br>
                            <label><?php echo $lista['Email']; ?></label><br>
                            <label><?php echo date("d/m/Y", strtotime($lista['DataNasc'])); ?></label><br>
                            <label><?php echo $lista['Fone']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (isset($_POST['vis6']) or isset($_POST['voltar7'])) {
            $select = $mysqli->query("SELECT * FROM alunos") or die($mysqli->error);
        ?>
            <div class="comeco">
                <div class="intro">
                    <h1>Alunos</h1>
                </div>
            </div>
            <div id="tudo" class="tudo-aluno">
                <form action="" method="post" class="pesquisar">
                    <div class="search" id="search-aluno">
                        <input type="text" placeholder="Procurar..." autocomplete="off" name="txtbsc6" id="">
                        <input type="submit" name="busca6" value="Buscar" id="btnBuscar">
                        <input type="submit" name="voltar1" value="Voltar">
                    </div>
                </form>
                <?php
                while ($lista = $select->fetch_assoc()) {
                ?>
                    <!-- conteiner que contêm a imagem da pessoa e informações com nome,data de nascimento e CPF -->
                    <div class="banner-aluno">
                        <div class="info-aluno">
                            <label><?php echo $lista['cod']; ?></label><br>

                            <label id="func">Aluno</label><br>
                            <label><?php echo $lista['nome']; ?></label><br>
                            <label><?php echo $lista['turma']; ?></label><br>
                            <label><?php echo $lista['periodo']; ?></label>
                        </div>
                    </div>
                    <!-- conteiner termina aqui -->
                <?php
                }
                ?>
            </div>
        <?php
        } elseif (
            !isset($_POST['vis1']) && !isset($_POST['vis2']) && !isset($_POST['vis3']) &&
            !isset($_POST['vis4']) && !isset($_POST['vis5']) && !isset($_POST['vis6']) or
            isset($_POST['voltar1'])
        ) {
            //////////////////////////////////////////////// INICIO E TAMBÉM QUANDO NENHUMA OPÇÇÃO É SELECIONADA /////////////////////////////////////////////////////
        ?>
            <div id="tudo" class="init">
                <div class="cardFunc cf1">
                    <p class="txtfun">Master</p>
                    <form action="" method="post">
                        <input type="submit" name="vis1" value="Visualizar" class="visu">
                    </form>
                </div>
                <div class="cardFunc cf2">
                    <p class="txtfun">Coordenador</p>
                    <form action="" method="post">
                        <input type="submit" name="vis2" value="Visualizar" class="visu">
                    </form>
                </div>
                <div class="cardFunc cf3">
                    <p class="txtfun">Secretário</p>
                    <form action="" method="post">
                        <input type="submit" name="vis3" value="Visualizar" class="visu">
                    </form>
                </div>
                <div class="cardFunc cf4">
                    <p class="txtfun">Professor</p>
                    <form action="" method="post">
                        <input type="submit" name="vis4" value="Visualizar" class="visu">
                    </form>
                </div>
                <div class="cardFunc cf5">
                    <p class="txtfun">Funcionário</p>
                    <form action="" method="post">
                        <input type="submit" name="vis5" value="Visualizar" class="visu">
                    </form>
                </div>
                <div class="cardFunc cf6">
                    <p class="txtfun">Aluno</p>
                    <form action="" method="post">
                        <input type="submit" name="vis6" value="Visualizar" class="visu">
                    </form>
                </div>
            </div>
        <?php
        } else {
        }
        ?>
    </main>
</body>

</html>