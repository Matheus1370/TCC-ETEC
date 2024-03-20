<?php
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('phpcode/UIDContainer.php', $Write);

include('Protect.php');
include('Conexao.php');
include('functions.php');

$codfuncao = $_SESSION['cargo'];
$sql_code2 = "SELECT Nm_Funcao FROM Funcao Where Cod_Funcao = $codfuncao ;";
$sql_query2 = $mysqli->query($sql_code2) or die("Falha na execução do código SQL: " . $mysqli->error);
$usuario2 = $sql_query2->fetch_assoc();
$usuario2['Nm_Funcao'];

if (isset($_POST['cadFun'])) { //        ======================================== CADASTRO FUNCIONÁRIO        =========================================
    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];

        if ($arquivo['error'])
            die("Falha ao enviar arquirvo");

        if ($arquivo['size'] > 2097152)
            die("Arquivo muito grande!!! Max: 2MB");

        $pasta = "Fotos_Fun/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png")
            die("Tipo de arquivo não aceito");

        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

        $deu_certo = move_uploaded_file($arquivo["tmp_name"],  $path);
        if ($deu_certo) {
            $nome = $_POST['nome'];
            $Data = $_POST['data'];
            $fone = $_POST['fone'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $funcao2 = $_POST['funcao'];
            $id = $_POST['id'];

            if ($funcao2 == 'master') {
                $funcao = 1;
                CadastroGeral($nome, $Data, $fone, $cpf, $email, $senha, $path, $funcao, $id);
                header("Location: Cad_Fun1.php");
            }
            if ($funcao2 == 'coordenador') {
                $funcao = 2;
                CadastroGeral($nome, $Data, $fone, $cpf, $email, $senha, $path, $funcao, $id);
                header("Location: Cad_Fun1.php");
            }
            if ($funcao2 == 'secretario') {
                $funcao = 3;
                CadastroGeral($nome, $Data, $fone, $cpf, $email, $senha, $path, $funcao, $id);
                header("Location: Cad_Fun1.php");
            }
            if ($funcao2 == 'professor') {
                $funcao = 4;
                CadastroGeral($nome, $Data, $fone, $cpf, $email, $senha, $path, $funcao, $id);
                header("Location: Cad_Fun1.php");
            }
            if ($funcao2 == 'funcionario') {
                $funcao = 5;
                CadastroGeral($nome, $Data, $fone, $cpf, $email, $senha, $path, $funcao, $id);
                header("Location: Cad_Fun1.php");
            }
        } else {
            echo "<p>Falha ao enviar arquivo</p>";
        }
    }
} elseif (isset($_POST['cadAln'])) { //   ======================================== CADASTRO ALUNO              =========================================
    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];

        if ($arquivo['error'])
            die("Falha ao enviar arquirvo");

        if ($arquivo['size'] > 2097152)
            die("Arquivo muito grande!!! Max: 2MB");

        $pasta = "Fotos_Aluno/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png")
            die("Tipo de arquivo não aceito");

        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

        $deu_certo = move_uploaded_file($arquivo["tmp_name"],  $path);
        if ($deu_certo) {
            $nome = $_POST['nome'];
            $Data = $_POST['data'];
            $fone = $_POST['fone'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $turma = $_POST['turma'];
            $periodo = $_POST['periodo'];
            $id = $_POST['id'];
            CadastroAluno($nome, $Data, $fone, $cpf, $email, $turma, $path, $periodo, $id, $senha);
            header("Location: Cad_Fun1.php");
        } else {
            echo "<p>Falha ao enviar arquivo</p>";
        }
    }
} elseif (isset($_POST['alterft1'])) { // ======================================== ALTERA FOTO DO FUNCIONÁRIO  =========================================
    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];

        if ($arquivo['error'])
            die("Falha ao enviar arquirvo");

        if ($arquivo['size'] > 2097152)
            die("Arquivo muito grande!!! Max: 2MB");

        $pasta = "Fotos_Fun/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png")
            die("Tipo de arquivo não aceito");

        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

        $deu_certo = move_uploaded_file($arquivo["tmp_name"],  $path);
        if ($deu_certo) {
            $email = $_POST['email'];
            alterft($email, $path);
        } else {
            echo "<p>Falha ao enviar arquivo</p>";
        }
    }
} elseif (isset($_POST['alter1'])) { //   ======================================== ALTERA DADOS DO FUNCIONÁRIO =========================================
    $id = $_POST['codigo'];
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $fone = $_POST['fone'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $funcao = $_POST['funcao'];
    $idcartao = $_POST['id'];

    if ($idcartao != '') {
        alterar($id, $nome, $data, $fone, $cpf, $email, $senha, $funcao, $idcartao);
    } else {
        $res = $mysqli->query("SELECT * FROM cartao WHERE cod_pessoa = $id") or die("Falha na execução do código SQL: " . $mysqli->error);
        $arq = $res->fetch_assoc();
        $idcartao2 = $arq['nm_cartao'];
        alterar($id, $nome, $data, $fone, $cpf, $email, $senha, $funcao, $idcartao2);
    }
} elseif (isset($_POST['exc1'])) { //     ======================================== EXCLUÍ DADOS DO FUNCIONÁRIO =========================================
    $id = $_POST['codigo'];
    excluir($id);
} elseif (isset($_POST['alterft2'])) { // ======================================== ALTERA FOTO DO ALUNO        =========================================
    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];

        if ($arquivo['error'])
            die("Falha ao enviar arquirvo");

        if ($arquivo['size'] > 2097152)
            die("Arquivo muito grande!!! Max: 2MB");

        $pasta = "Fotos_Aluno/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png")
            die("Tipo de arquivo não aceito");

        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

        $deu_certo = move_uploaded_file($arquivo["tmp_name"],  $path);
        if ($deu_certo) {
            $email = $_POST['email'];
            alterftAluno($email, $path);
        } else {
            echo "<p>Falha ao enviar arquivo</p>";
        }
    }
} elseif (isset($_POST['alter2'])) { //   ======================================== ALTERA DADOS DO ALUNO       =========================================
    $id = $_POST['codigo'];
    $nome = $_POST['nome'];
    $Data = $_POST['data'];
    $fone = $_POST['fone'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $turma = $_POST['turma'];
    $periodo = $_POST['periodo'];
    $idcartao = $_POST['id'];

    if ($idcartao != '') {
        alterarAluno($id, $nome, $Data, $fone, $cpf, $email, $turma, $periodo, $senha, $idcartao);
    } else {
        $res = $mysqli->query("SELECT * FROM cartao WHERE cod_aluno = $id") or die("Falha na execução do código SQL: " . $mysqli->error);
        $arq = $res->fetch_assoc();
        $idcartao2 = $arq['nm_cartao'];
        alterarAluno($id, $nome, $Data, $fone, $cpf, $email, $turma, $periodo, $senha, $idcartao2);
    }
} elseif (isset($_POST['exc2'])) { //     ======================================== EXCLUÍ DADOS DO ALUNO       =========================================
    $id = $_POST['codigo'];
    excluirAluno($id);
} else {
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="css/Dashboard/syle_Dashboard.css">
    <link rel="stylesheet" href="css/Dashboard/cad_fun.css">
    <link rel="stylesheet" href="css/Dashboard/cad_fun2.css">
    <!-- Icones utilizados na navbar -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="phpcode/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#getUID").load("phpcode/UIDContainer.php");
            setInterval(function() {
                $("#getUID").load("phpcode/UIDContainer.php");
            }, 500);
        });
    </script>
    <!-- Gráfico -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Etec - Dashborad</title>
</head>

<body>
    <?php include('_partials/navBar.php') ?>
    <main>
        <?php
        if (isset($_POST['cadFuncionario'])) { // ============================================================== CADASTRO DO FUNCIONÁRIO ======================================================================================================== 
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="POST">
                            <div class="login-container">
                                <!--input do FOTO-->
                                <p>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name='arquivo' id="picture__input">
                                    <script src="js/script2.js"></script>
                                </p>
                                <!--input do NOME-->
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="Nome" required="" name='nome'>
                                    <label for="Nome" class="form__label">Nome</label>
                                </div>
                                <!--input da DATA DE NASCIMENTO-->
                                <div class="form__group field">
                                    <input type="date" class="form__field" placeholder="data" required="" name='data'>
                                    <label for="data" class="form__label">Data de Nascimento</label>
                                </div>
                                <!--input do TELEFONE-->
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="Celular" required="" minlength="11" maxlength="11" name='fone'>
                                    <label for="fone" class="form__label">Celular</label>
                                </div>
                                <!--input do CPF-->
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="CPF" required="" minlength="11" maxlength="11" name='cpf'>
                                    <label for="CPF" class="form__label">CPF</label>
                                </div>
                                <!--input do EMAIL-->
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="Email" required="" name='email'>
                                    <label for="email" class="form__label">Email</label>
                                </div>
                                <!--input do SENHA-->
                                <div class='form__group field'>
                                    <input type='input' class='form__field' placeholder='Senha' required='' name='senha' pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                                    <label for='Senha' class='form__label'>Senha</label>
                                </div>
                                <!--input do Função-->
                                <div class='form__group field'>
                                    <select name="funcao" class='form__field droplist'>
                                        <option value=""></option>
                                        <option value="master">Master</option>
                                        <option value="coordenador">Coordenador</option>
                                        <option value="secretario">Secretário</option>
                                        <option value="professor">Professor</option>
                                        <option value="funcionario">Funcionário</option>
                                    </select>
                                    <label for='funcao' class='form__label'>Função</label>
                                </div>

                                <textarea name="id" style="width:320px; height:30px; margin-top:20px" id="getUID" placeholder="Please Tag your Card / Key Chain to display ID" rows="1" cols="1" required></textarea>


                                <!--Botão de continuar-->
                                <div class="main_div">
                                    <input type='submit' name="cadFun" value='Continuar' id='button'>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php

        } elseif (isset($_POST['cadAluno'])) { // ================================================================== CADASTRO DO ALUNO ===========================================================================================
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="POST">
                            <div class="login-container">
                                <!--input do FOTO-->
                                <p>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name='arquivo' id="picture__input">
                                    <script src="js/script2.js"></script>
                                </p>
                                <!--input do NOME-->
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="Nome" required="" name='nome'>
                                    <label for="Nome" class="form__label">Nome</label>
                                </div>
                                <!--input da DATA DE NASCIMENTO-->
                                <div class="form__group field">
                                    <input type="date" class="form__field" placeholder="data" required="" name='data'>
                                    <label for="data" class="form__label">Data de Nascimento</label>
                                </div>
                                <!--input do TELEFONE-->
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="Celular" required="" minlength="11" maxlength="11" name='fone'>
                                    <label for="fone" class="form__label">Celular</label>
                                </div>
                                <!--input do CPF-->
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="CPF" required="" minlength="11" maxlength="11" name='cpf'>
                                    <label for="CPF" class="form__label">CPF</label>
                                </div>
                                <!--input do EMAIL-->
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="Email" required="" name='email'>
                                    <label for="email" class="form__label">Email</label>
                                </div>
                                <!--input do SENHA-->
                                <div class='form__group field'>
                                    <input type='input' class='form__field' placeholder='Senha' required='' name='senha' pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                                    <label for='Senha' class='form__label'>Senha</label>
                                </div>
                                <!--input do Turma-->
                                <div class='form__group field'>
                                    <select name="turma" class='form__field droplist'>
                                        <option value=""></option>
                                        <option value="DS">DS</option>
                                        <option value="ADM">ADM</option>
                                    </select>
                                    <label for='turma' class='form__label'>Turma</label>
                                </div>
                                <!--input do Periodo-->
                                <div class='form__group field'>
                                    <select name="periodo" class='form__field droplist'>
                                        <option value=""></option>
                                        <option value="Manhã">Manhã</option>
                                        <option value="Noite">Noite</option>
                                    </select>
                                    <label for='periodo' class='form__label'>Periodo</label>
                                </div>
                                <div class='form__group field'>
                                    <textarea name="id" style="width:320px; height:30px; margin-top:20px" id="getUID" placeholder="Please Tag your Card / Key Chain to display ID" rows="1" cols="1" required></textarea>
                                </div>
                                <!--Botão de continuar-->
                                <div class="main_div">
                                    <input type='submit' name="cadAln" value='Continuar' id='button'>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php

        } elseif (isset($_POST['pesquisa4'])) { // ============================================ EXCLUIR ALUNO =============================================
            $email = $_POST['email'];
            $res = $mysqli->query("SELECT * FROM pessoa WHERE email = '$email'") or die("Falha na execução do código SQL: " . $mysqli->error);
            $arq = $res->fetch_assoc();
            $funcao = $arq['Cod_Funcao'];
            $res2 = $mysqli->query("SELECT * FROM Funcao WHERE Cod_Funcao = $funcao") or die("Falha na execução do código SQL: " . $mysqli->error);
            $arq2 = $res2->fetch_assoc();
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="POST">
                            <img src="<?php echo $arq['path']; ?>" width="220px" height="300px"><br>
                            <!--input do NOME-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Nome" required="" name='nome' value="<?php echo $arq['Nome']; ?>">
                                <label for="Nome" class="form__label">Nome</label>
                            </div>
                            <!--input da DATA DE NASCIMENTO-->
                            <div class="form__group field">
                                <input type="date" class="form__field" placeholder="data" required="" name='data' value="<?php echo $arq['DataNasc']; ?>">
                                <label for="data" class="form__label">Data de Nascimento</label>
                            </div>
                            <!--input do TELEFONE-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Celular" required="" minlength="11" maxlength="11" name='fone' value="<?php echo $arq['Fone']; ?>">
                                <label for="fone" class="form__label">Celular</label>
                            </div>
                            <!--input do CPF-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="CPF" required="" minlength="11" maxlength="11" name='cpf' value="<?php echo $arq['CPF']; ?>">
                                <label for="CPF" class="form__label">CPF</label>
                            </div>
                            <!--input do EMAIL-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Email" required="" name='email' value="<?php echo $arq['Email']; ?>">
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <!--input do SENHA-->
                            <div class='form__group field'>
                                <input type='password' class='form__field' placeholder='Senha' required='' name='senha' value="<?php echo $arq['Senha']; ?>">
                                <label for='Senha' class='form__label'>Senha</label>
                            </div>
                            <!--input do SENHA-->
                            <div class='form__group field'>
                                <select name="funcao" class='form__field droplist'>
                                    <option value="<?php echo $arq2['Cod_Funcao']; ?>"><?php echo $arq2['Nm_Funcao']; ?></option>
                                    <option value="1">Master</option>
                                    <option value="2">Coordenador</option>
                                    <option value="3">Secretário</option>
                                    <option value="4">Professor</option>
                                    <option value="5">Funcionário</option>
                                </select>
                                <label for='funcao' class='form__label'>Função</label>
                            </div>
                            <input type="hidden" name="codigo" value="<?php echo $arq['CodPessoa']; ?>">
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="exc2" value='Continuar' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_POST['pesquisa3'])) { // ============================================ ALTERAR ALUNO =============================================
            $email = $_POST['email'];
            $res = $mysqli->query("SELECT * FROM alunos WHERE email = '$email'") or die("Falha na execução do código SQL: " . $mysqli->error);
            $arq = $res->fetch_assoc();
            $codigo = $arq['cod'];
            $res3 = $mysqli->query("SELECT * FROM cartao WHERE cod_aluno = $codigo") or die("Falha na execução do código SQL: " . $mysqli->error);
            $arq3 = $res3->fetch_assoc();
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="post">
                            <img src="<?php echo $arq['path']; ?>" width="220px" height="300px"><br>
                            <div class="login-container">
                                <!--input do FOTO-->
                                <p>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name='arquivo' id="picture__input">
                                    <script src="js/script2.js"></script>
                                </p>
                                <!--Botão de continuar-->
                                <div class="main_div">
                                    <input type='submit' name="alterft" value='Continuar' id='button'>
                                </div>
                        </form>
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="POST">
                            <!--input do NOME-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Nome" required="" name='nome' value="<?php echo $arq['nome']; ?>">
                                <label for="Nome" class="form__label">Nome</label>
                            </div>
                            <!--input da DATA DE NASCIMENTO-->
                            <div class="form__group field">
                                <input type="date" class="form__field" placeholder="data" required="" name='data' value="<?php echo $arq['dtNasc']; ?>">
                                <label for="data" class="form__label">Data de Nascimento</label>
                            </div>
                            <!--input do TELEFONE-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Celular" required="" minlength="11" maxlength="11" name='fone' value="<?php echo $arq['fone']; ?>">
                                <label for="fone" class="form__label">Celular</label>
                            </div>
                            <!--input do CPF-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="CPF" required="" minlength="11" maxlength="11" name='cpf' value="<?php echo $arq['cpf']; ?>">
                                <label for="CPF" class="form__label">CPF</label>
                            </div>
                            <!--input do EMAIL-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Email" required="" name='email' value="<?php echo $arq['email']; ?>">
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <!--input do SENHA-->
                            <div class='form__group field'>
                                <input type='password' class='form__field' placeholder='Senha' required='' name='senha' value="<?php echo $arq['senha']; ?>">
                                <label for='Senha' class='form__label'>Senha</label>
                            </div>
                            <!--input do Turma-->
                            <div class='form__group field'>
                                <select name="turma" class='form__field droplist'>
                                    <option value="<?php echo $arq['turma']; ?>"><?php echo $arq['turma']; ?></option>
                                    <option value="DS">DS</option>
                                    <option value="ADM">ADM</option>
                                </select>
                                <label for='turma' class='form__label'>Turma</label>
                            </div>
                            <!--input do Periodo-->
                            <div class='form__group field'>
                                <select name="periodo" class='form__field droplist'>
                                    <option value="<?php echo $arq['periodo']; ?>"><?php echo $arq['periodo']; ?></option>
                                    <option value="Manhã">Manhã</option>
                                    <option value="Noite">Noite</option>
                                </select>
                                <label for='periodo' class='form__label'>Periodo</label>
                            </div>
                            <input type="hidden" name="codigo" value="<?php echo $arq['cod']; ?>">
                            <?php if ($arq3['nm_cartao'] == null or $arq3['nm_cartao'] == '') { ?>
                                <textarea name="id" style="width:320px; height:30px; margin-top:20px" id="getUID" placeholder="Please Tag your Card / Key Chain to display ID" rows="1" cols="1"></textarea>
                            <?php } else { ?>
                                <textarea name="id" style="width:320px; height:30px; margin-top:20px" id="getUID" placeholder="<?php echo $arq3['nm_cartao']; ?>" rows="1" cols="1"></textarea>
                            <?php } ?>
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="alter2" value='Continuar' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_POST['pesquisa2'])) { // ============================================ EXCLUIR FUNCIONÁRIO =============================================
            $email = $_POST['email'];
            $res = $mysqli->query("SELECT * FROM pessoa WHERE email = '$email'") or die("Falha na execução do código SQL: " . $mysqli->error);
            $arq = $res->fetch_assoc();
            $funcao = $arq['Cod_Funcao'];
            $res2 = $mysqli->query("SELECT * FROM Funcao WHERE Cod_Funcao = $funcao") or die("Falha na execução do código SQL: " . $mysqli->error);
            $arq2 = $res2->fetch_assoc();
            $codigo = $arq['CodPessoa'];
            $res3 = $mysqli->query("SELECT * FROM cartao WHERE cod_pessoa = $codigo") or die("Falha na execução do código SQL: " . $mysqli->error);
            $arq3 = $res3->fetch_assoc();
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="POST">
                            <img src="<?php echo $arq['path']; ?>" width="220px" height="300px"><br>
                            <!--input do NOME-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Nome" required="" name='nome' value="<?php echo $arq['Nome']; ?>">
                                <label for="Nome" class="form__label">Nome</label>
                            </div>
                            <!--input da DATA DE NASCIMENTO-->
                            <div class="form__group field">
                                <input type="date" class="form__field" placeholder="data" required="" name='data' value="<?php echo $arq['DataNasc']; ?>">
                                <label for="data" class="form__label">Data de Nascimento</label>
                            </div>
                            <!--input do TELEFONE-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Celular" required="" minlength="11" maxlength="11" name='fone' value="<?php echo $arq['Fone']; ?>">
                                <label for="fone" class="form__label">Celular</label>
                            </div>
                            <!--input do CPF-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="CPF" required="" minlength="11" maxlength="11" name='cpf' value="<?php echo $arq['CPF']; ?>">
                                <label for="CPF" class="form__label">CPF</label>
                            </div>
                            <!--input do EMAIL-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Email" required="" name='email' value="<?php echo $arq['Email']; ?>">
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <!--input do SENHA-->
                            <div class='form__group field'>
                                <input type='password' class='form__field' placeholder='Senha' required='' name='senha' value="<?php echo $arq['Senha']; ?>">
                                <label for='Senha' class='form__label'>Senha</label>
                            </div>
                            <!--input do SENHA-->
                            <div class='form__group field'>
                                <select name="funcao" class='form__field droplist'>
                                    <option value="<?php echo $arq2['Cod_Funcao']; ?>"><?php echo $arq2['Nm_Funcao']; ?></option>
                                    <option value="1">Master</option>
                                    <option value="2">Coordenador</option>
                                    <option value="3">Secretário</option>
                                    <option value="4">Professor</option>
                                    <option value="5">Funcionário</option>
                                </select>
                                <label for='funcao' class='form__label'>Função</label>
                            </div>
                            <?php if ($arq3['nm_cartao'] == null or $arq3['nm_cartao'] == '') { ?>
                                <textarea name="id" style="width:320px; height:30px; margin-top:20px" id="getUID" placeholder="Cartão não registrado!" rows="1" cols="1"></textarea>
                            <?php } else { ?>
                                <textarea name="id" style="width:320px; height:30px; margin-top:20px" id="getUID" placeholder="<?php echo $arq3['nm_cartao']; ?>" rows="1" cols="1"></textarea>
                            <?php } ?>
                            <input type="hidden" name="codigo" value="<?php echo $arq['CodPessoa']; ?>">
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="exc1" value='Continuar' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_POST['pesquisa1'])) { // ============================================ ALTERAR FUNCIONÁRIO =============================================
            $email = $_POST['email'];
            $res = $mysqli->query("SELECT * FROM pessoa WHERE email = '$email'") or die("Falha na execução do código SQL: " . $mysqli->error);
            $arq = $res->fetch_assoc();
            $funcao = $arq['Cod_Funcao'];
            $res2 = $mysqli->query("SELECT * FROM Funcao WHERE Cod_Funcao = $funcao") or die("Falha na execução do código SQL: " . $mysqli->error);
            $arq2 = $res2->fetch_assoc();
            $codigo = $arq['CodPessoa'];
            $res3 = $mysqli->query("SELECT * FROM cartao WHERE cod_pessoa = $codigo") or die("Falha na execução do código SQL: " . $mysqli->error);
            $arq3 = $res3->fetch_assoc();
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="post">
                            <img src="<?php echo $arq['path']; ?>" width="220px" height="300px"><br>
                            <div class="login-container">
                                <!--input do FOTO-->
                                <p>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name='arquivo' id="picture__input">
                                    <script src="js/script2.js"></script>
                                </p>
                                <!--Botão de continuar-->
                                <div class="main_div">
                                    <input type='submit' name="alterft" value='Continuar' id='button'>
                                </div>
                        </form>
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="POST">
                            <!--input do NOME-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Nome" required="" name='nome' value="<?php echo $arq['Nome']; ?>">
                                <label for="Nome" class="form__label">Nome</label>
                            </div>
                            <!--input da DATA DE NASCIMENTO-->
                            <div class="form__group field">
                                <input type="date" class="form__field" placeholder="data" required="" name='data' value="<?php echo $arq['DataNasc']; ?>">
                                <label for="data" class="form__label">Data de Nascimento</label>
                            </div>
                            <!--input do TELEFONE-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Celular" required="" minlength="11" maxlength="11" name='fone' value="<?php echo $arq['Fone']; ?>">
                                <label for="fone" class="form__label">Celular</label>
                            </div>
                            <!--input do CPF-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="CPF" required="" minlength="11" maxlength="11" name='cpf' value="<?php echo $arq['CPF']; ?>">
                                <label for="CPF" class="form__label">CPF</label>
                            </div>
                            <!--input do EMAIL-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Email" required="" name='email' value="<?php echo $arq['Email']; ?>">
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <!--input do SENHA-->
                            <div class='form__group field'>
                                <input type='password' class='form__field' placeholder='Senha' required='' name='senha' value="<?php echo $arq['Senha']; ?>">
                                <label for='Senha' class='form__label'>Senha</label>
                            </div>
                            <!--input do SENHA-->
                            <div class='form__group field'>
                                <select name="funcao" class='form__field droplist'>
                                    <option value="<?php echo $arq2['Cod_Funcao']; ?>"><?php echo $arq2['Nm_Funcao']; ?></option>
                                    <option value="1">Master</option>
                                    <option value="2">Coordenador</option>
                                    <option value="3">Secretário</option>
                                    <option value="4">Professor</option>
                                    <option value="5">Funcionário</option>
                                </select>
                                <label for='funcao' class='form__label'>Função</label>
                            </div>
                            <input type="hidden" name="codigo" value="<?php echo $arq['CodPessoa']; ?>">
                            <?php if ($arq3['nm_cartao'] == null or $arq3['nm_cartao'] == '') { ?>
                                <textarea name="id" style="width:320px; height:30px; margin-top:20px" id="getUID" placeholder="Please Tag your Card / Key Chain to display ID" rows="1" cols="1"></textarea>
                            <?php } else { ?>
                                <textarea name="id" style="width:320px; height:30px; margin-top:20px" id="getUID" placeholder="<?php echo $arq3['nm_cartao']; ?>" rows="1" cols="1"></textarea>
                            <?php } ?>
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="alter1" value='Continuar' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_POST['pesqFun1'])) { // ============================================= ALTERAR: INSERIR O EMAIL PARA FAZER BUSCA NA TABELA PESSOA ====================================================
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="POST">
                            <!--input do NOME-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="email" required="" name='email'>
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="pesquisa1" value='Continuar' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_POST['pesqFun2'])) { // ============================================= EXCLUIR: INSERIR O EMAIL PARA FAZER BUSCA NA TABELA PESSOA ====================================================
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="POST">
                            <!--input do NOME-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="email" required="" name='email'>
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="pesquisa2" value='Continuar' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_POST['pesqAln1'])) { // ============================================= ALTERAR: INSERIR O EMAIL PARA FAZER BUSCA NA TABELA ALUNOS ====================================================
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="POST">
                            <!--input do NOME-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="email" required="" name='email'>
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="pesquisa3" value='Continuar' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_POST['pesqAln2'])) { // ============================================= EXCLUIR: INSERIR O EMAIL PARA FAZER BUSCA NA TABELA ALUNOS ====================================================
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" autocomplete="off" method="POST">
                            <!--input do NOME-->
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="email" required="" name='email'>
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="pesquisa4" value='Continuar' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_POST['cadastrar'])) { // ============================================ ESCOLHA ENTRE CADASTRAR FUNCIONÁRIO OU ALUNO ==========================================================
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" method="post">
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="cadFuncionario" value='Funcionário' id='button'>
                            </div>
                        </form>
                        <form action="" enctype="multipart/form-data" method="post">
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="cadAluno" value='Aluno' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_POST['alterar'])) { // ============================================== ESCOLHA ENTRE ALTERAR FUNCIONÁRIO OU ALUNO ====================================================
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" method="post">
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="pesqFun1" value='Funcionário' id='button'>
                            </div>
                        </form>
                        <form action="" enctype="multipart/form-data" method="post">
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="pesqAln1" value='Aluno' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } elseif (isset($_POST['excluir'])) { // =============================================== ESCOLHA ENTRE EXCLUIR FUNCIONÁRIO OU ALUNO ==========================================
        ?>
            <div class="container1">
                <div class="info">
                    <div class="Alunos">
                        <form action="" enctype="multipart/form-data" method="post">
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="pesqFun2" value='Funcionário' id='button'>
                            </div>
                        </form>
                        <form action="" enctype="multipart/form-data" method="post">
                            <!--Botão de continuar-->
                            <div class="main_div">
                                <input type='submit' name="pesqAln1" value='Aluno' id='button'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php
        } else { // ========================================================================== ESCOLHA ENTRE CADASTRAR, ALTERAR OU EXCLUIR =========================================================================  
        ?>
            <div id="tudo">
                <div class="inicio">
                    <div class="cardFunc cf1">
                        <p class="txtfun">Cadastrar</p>
                        <form action="" method="post">
                            <input type="submit" name="cadastrar" value="Continuar">
                        </form>
                    </div>
                    <div class="cardFunc cf2">
                        <p class="txtfun">Alterar</p>
                        <form action="" method="post">
                            <input type="submit" name="alterar" value="Continuar">
                        </form>
                    </div>
                    <div class="cardFunc cf3">
                        <p class="txtfun">Excluir</p>
                        <form action="" method="post">
                            <input type="submit" name="excluir" value="Continuar">
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </main>
    <script src="js/script1.js"></script>
    <script src="js/grafico2.js"></script>
</body>

</html>