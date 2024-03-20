<?php
     
    require 'database.php';
	include('Conexao.php');
	$cartao = $_POST['id'];

    $res2 = mysqli_query($mysqli,"select * from cartao where nm_cartao = '$cartao'"); 
    $quantidade = $res2->num_rows;
    $arq = $res2->fetch_assoc();

    if($quantidade != 0 and $arq['cod_pessoa'] != 0 or  $quantidade != 0 and $arq['cod_aluno'] != 0 or  $quantidade != 0 and $arq['cod_visitante'] != 0){
        echo "<script>
                alert ('Cartão já cadastrado!!!');
                window.location.href = 'user data.php';
              </script>";
    }else{
		if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];
    
        if($arquivo['error'])
            die("Falha ao enviar arquirvo");
    
        if($arquivo['size'] > 2097152)
            die("Arquivo muito grande!!! Max: 2MB");
    
        $pasta = "../Fotos_Visitante/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    
        if($extensao != "jpg" && $extensao != "png")
            die("Tipo de arquivo não aceito");
    
        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    
        $deu_certo = move_uploaded_file($arquivo["tmp_name"],  $path);
        if($deu_certo){
			$nome = $_POST['name'];
			$fone = $_POST['fone'];
			$cpf = $_POST['cpf'];
    
            
			$res = mysqli_query($mysqli,"INSERT INTO visitante(nome, fone, cpf, path) VALUES('$nome','$fone','$cpf','$path')"); 

			$res5 = mysqli_query($mysqli,"select * from visitante where cpf = '$cpf'"); 
			$arq2 = $res5->fetch_assoc();
			$codigo = $arq2['cod'];

			if($quantidade != 0 and $arq['cod_aluno'] == 0 and $arq['cod_pessoa'] == 0 and $arq['cod_visitante'] == 0){
				$res3 = mysqli_query($mysqli,"UPDATE cartao SET cod_visitante = $codigo where nm_cartao = '$cartao'"); 
                echo "<script>
                        alert ('Cadastro realizada com sucesso!!!');
                        window.location.href = 'user data.php';
                    </script>";
			}else{
				$res3 = mysqli_query($mysqli,"INSERT INTO cartao(nm_cartao,cod_visitante) VALUES('$cartao',$codigo)"); 
                echo "<script>
                        alert ('Cadastro realizada com sucesso!!!');
                        window.location.href = 'user data.php';
                    </script>";
			}
        }
        else{
			echo "<script>
					alert ('Falha ao enviar arquivo!!!');
					window.location.href = 'registration.php';
				  </script>";
        }
    	}
    }
    
?>