<?php
include('Conexao.php');

if(isset($_POST['login']) || isset($_POST['senha'])) {

    if(strlen($_POST['login']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['login']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM Pessoa WHERE Email = '$email' AND Senha = '$senha'";
        $sql_code2 = "SELECT * FROM Funcao";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['CodPessoa'];
            $_SESSION['nome'] = $usuario['Nome'];
            $_SESSION['path'] = $usuario['path'];
            $_SESSION['cargo'] = $usuario['Cod_Funcao'];


            header("Location: Dashboard.php");

        } else {
            echo "<div class = 'e'> Falha ao logar! E-mail ou senha incorretos</div>";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style_navbar.css">
    <link rel="shortcut icon" href="img/favicon_autosystem.ico">
</head>

<body>
<a href="index.html"><img class="logo2" src="img/LogoAutoSystemWhite.png" alt="Logo-Empresa"></a>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </label>
    <!-- Criação da NavBar -->
    <button id="btn-mobile" class="btn-mobile">Menu</button>
    <header>
        <a href="index.html"><img src="img/logoescuro.png" alt="Logo-Empresa"></a>
    </header>
    <!-- Criação da NavBar -->
    <main>
        <div class="login-container">
            <form action="" method="POST">
                <h3>ENTRAR</h3>
            <div class="form__group field">
                <input type="input" class="form__field" placeholder="Login" required name='login'>
                <label for="Login" class="form__label">Login:</label>
            </div>
            <div class="form__group field">
                <input type="password" class="form__field" placeholder="Senha" required name='senha'>
                <label for="Senha" class="form__label">Senha:</label>
            </div>
            <div class="main_div">
                <button>ENTRAR</button>
            </div>
            </form>
        </div>
    </main>

</body>

</html>