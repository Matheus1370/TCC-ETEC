<?php

function CadastroAluno($a, $b, $c, $d, $e, $f, $g, $h, $i, $j){
	include 'Conexao.php';

	$res2 = mysqli_query($mysqli,"select * from cartao where nm_cartao = '$i'"); 
    $quantidade = $res2->num_rows;
    $arq = $res2->fetch_assoc();

    if($quantidade != 0 and $arq['cod_pessoa'] != '' or $quantidade != 0 and $arq['cod_aluno'] != ''){
        echo "<script>
                alert ('Cartão já cadastrado!!!');
                window.location.href = 'Cad_Fun1.php';
              </script>";
    }else{
        $res = mysqli_query($mysqli,"INSERT INTO Alunos(nome, dtNasc, fone, cpf, email, turma, path, periodo, frequencia,senha) VALUES('$a','$b','$c','$d','$e','$f','$g','$h', 0,'$j')"); 
        echo "<script>
                alert ('Cadastro realizada com sucesso!!!');
                window.location.href = 'Cad_Fun1.php';
              </script>";

        $res5 = mysqli_query($mysqli,"select * from alunos where Email = '$e'"); 
        $arq2 = $res5->fetch_assoc();
        $codigo = $arq2['cod'];

        if($quantidade != 0 and $arq['cod_aluno'] == ''){
            $res3 = mysqli_query($mysqli,"UPDATE cartao SET cod_aluno = $codigo where nm_cartao = '$i')"); 
        }else{
            $res3 = mysqli_query($mysqli,"INSERT INTO cartao(nm_cartao,cod_aluno) VALUES('$i',$codigo)"); 
        }
    }
}

function CadastroGeral($a, $b, $c, $d, $e, $f, $g, $h, $i){
	include 'Conexao.php';

	$res2 = mysqli_query($mysqli,"select * from cartao where nm_cartao = '$i'"); 
    $quantidade = $res2->num_rows;
    $arq = $res2->fetch_assoc();

    if($quantidade != 0 and $arq['cod_pessoa'] != '' or $quantidade != 0 and $arq['cod_aluno'] != ''){
        echo "<script>
                alert ('Cartão já cadastrado!!!');
                window.location.href = 'Cad_Fun1.php';
              </script>";
    }else{
        $res = mysqli_query($mysqli,"INSERT INTO Pessoa(Nome, DataNasc, Fone, CPF, Email, Senha, path, Cod_Funcao) VALUES('$a','$b','$c','$d','$e','$f','$g',$h)"); 
        echo "<script>
                alert ('Cadastro realizada com sucesso!!!');
                window.location.href = 'Cad_Fun1.php';
              </script>";

        $res5 = mysqli_query($mysqli,"select * from pessoa where Email = '$e'"); 
        $arq2 = $res5->fetch_assoc();
        $codigo = $arq2['CodPessoa'];

        if($quantidade != 0 and $arq['cod_pessoa'] == ''){
            $res3 = mysqli_query($mysqli,"UPDATE cartao SET cod_pessoa = $codigo where nm_cartao = '$i')"); 
        }else{
            $res3 = mysqli_query($mysqli,"INSERT INTO cartao(nm_cartao,cod_pessoa) VALUES('$i',$codigo)"); 
        }
    }
}

function alterft($a, $b){
    include('Conexao.php');

        $sql_query = $mysqli->query("SELECT * FROM Pessoa WHERE Email = '$a'") or die($mysqli->error);
        $arquivo = $sql_query->fetch_assoc();
        $imagem = $arquivo['path'];
        unlink($imagem);
    
        $res = mysqli_query($mysqli,"UPDATE Pessoa SET path = '$b' WHERE Email = '$a'"); 

    mysqli_close($mysqli);
}

function alterar($a, $b, $c, $d, $e, $f, $g, $h, $i){
    include('Conexao.php');
    $res2 = mysqli_query($mysqli,"UPDATE cartao SET nm_cartao = '$i' where cod_pessoa = $a");
    $res = mysqli_query($mysqli,"UPDATE Pessoa SET Nome = '$b', DataNasc = '$c', Fone = '$d', CPF = '$e', Email = '$f', Senha = '$g', Cod_Funcao = '$h' where CodPessoa = $a"); 
}

function excluir($a){
    include('Conexao.php');
    $res2 = mysqli_query($mysqli,"UPDATE cartao SET cod_pessoa = '' where cod_pessoa = $a");
    $res = mysqli_query($mysqli,"DELETE FROM Pessoa where CodPessoa = $a");
}

function alterftAluno($a, $b){
    include('Conexao.php');
    $sql_query = $mysqli->query("SELECT * FROM alunos WHERE email = '$a'") or die($mysqli->error);
    $arquivo = $sql_query->fetch_assoc();
    $imagem = $arquivo['path'];
    unlink($imagem);
    $res = mysqli_query($mysqli,"UPDATE alunos SET path = '$b' WHERE email = '$a'"); 
}

function alterarAluno($a, $b, $c, $d, $e, $f, $g, $h, $i, $j){
    include('Conexao.php');
    $res2 = mysqli_query($mysqli,"UPDATE cartao SET nm_cartao = '$j' where cod_pessoa = $a");
    $res = mysqli_query($mysqli,"UPDATE alunos SET nome = '$b', dtNasc = '$c', fone = '$d', cpf = '$e', email = '$f', turma = '$g', periodo = '$h', senha = '$i' where cod = $a"); 
}

function excluirAluno($a){
    include('Conexao.php');
    $res2 = mysqli_query($mysqli,"UPDATE cartao SET cod_aluno = '' where cod_aluno = $a");
    $res = mysqli_query($mysqli,"DELETE FROM alunos where cod = $a");
}