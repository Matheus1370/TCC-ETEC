<?php
    require 'database.php';
    require 'Conexao.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM cartao where nm_cartao = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
	
	$res11 = mysqli_query($mysqli,"SELECT * FROM cartao where nm_cartao = '$id'");
	$quantidade3 = $q->rowCount();

	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
	
	$datas = strftime('%A, %d de %B de %Y', strtotime('today'));

	/*
	# %A: dia da semana por extenso.
	# %d: dia do mês representado com dois digitos.
	# %B: mês por extenso.
	%Y: ano representado com quatro digitos.
	*/

	$nomediadasemana = strftime('%A', strtotime('today'));
	
	$msg = null;
	if($quantidade3 == 0){
		$msg = "Cartão não registrado!!!";
		$cartao = $id;
		$nome = "--------";
		$fone = "--------";
		$cpf = "--------";
		$msgft = '--------';
		$path = '';
		$largura = '0px';
		$altura = '0px';
		$ec = 'left';
	}elseif ( $data['cod_pessoa'] == 0 && $data['cod_aluno'] == 0 && $data['cod_visitante'] == 0) {
		$msg = "Cartão não registrado!!!";
		$cartao = $id;
		$nome = "--------";
		$fone = "--------";
		$cpf = "--------";
		$msgft = '--------';
		$path = '';
		$largura = '0px';
		$altura = '0px';
		$ec = 'left';
	} else {
		$largura = '120px';
		$altura = '120px';
		$cartao = $data['nm_cartao'];
		$msg = null;
		$msgft = '';
		$ec = 'center';

		$res4 = mysqli_query($mysqli,"SELECT * FROM validacao WHERE Id_Cartao = '$id'");
		$quantidade = $res4->num_rows;
        $arq = $res4->fetch_assoc();
		
		$res8 = mysqli_query($mysqli,"SELECT * FROM validacao WHERE Id_Cartao = '$id' and Status = 'Ativado'");
		$quantidade2 = $res8->num_rows;
        $arq2 = $res8->fetch_assoc();

		$res10 = mysqli_query($mysqli,"SELECT * FROM cartao WHERE nm_cartao = '$id'");
		$quantidade = $res10->num_rows;
        $arq3 = $res10->fetch_assoc();

		if($arq3['cod_pessoa'] != 0 && $arq3['cod_aluno'] == 0 && $arq3['cod_visitante'] == 0){
			$codFun = $arq3['cod_pessoa'];
			$res12 = mysqli_query($mysqli,"SELECT * FROM pessoa where CodPessoa = '$codFun'");
			$arq4 = $res12->fetch_assoc();
			$nome = $arq4['Nome'];
			$fone = $arq4['Fone'];
			$cpf = $arq4['CPF'];
			$path = $arq4['path'];
		}
		elseif($arq3['cod_pessoa'] == 0 && $arq3['cod_aluno'] != 0 && $arq3['cod_visitante'] == 0){
			$codAluno = $arq3['cod_aluno'];
			$res12 = mysqli_query($mysqli,"SELECT * FROM alunos where cod = '$codAluno'");
			$arq4 = $res12->fetch_assoc();
			$nome = $arq4['nome'];
			$fone = $arq4['fone'];
			$cpf = $arq4['cpf'];
			$path = $arq4['path'];
		}else{
			$codVisit = $arq3['cod_visitante'];
			$res12 = mysqli_query($mysqli,"SELECT * FROM visitante where cod = '$codVisit'");
			$arq4 = $res12->fetch_assoc();
			$nome = $arq4['nome'];
			$fone = $arq4['fone'];
			$cpf = $arq4['cpf'];
			$path = $arq4['path'];
		}

		if($quantidade2 == 1){

			$res7 = mysqli_query($mysqli,"UPDATE validacao SET Data_Hora_Saida =  CURRENT_TIMESTAMP(), Status = 'Desativado' where Id_Cartao = '$id' and Status = 'Ativado'");
			if($nomediadasemana == "domingo"){
				$res9 = mysqli_query($mysqli,"UPDATE mediasemana SET frequencia = frequencia + 1 where nome = 'Domingo'");
			}elseif($nomediadasemana == "segunda-feira"){
				$res9 = mysqli_query($mysqli,"UPDATE mediasemana SET frequencia = frequencia + 1 where nome = 'Segunda'");
			}elseif($nomediadasemana == "terça-feira"){
				$res9 = mysqli_query($mysqli,"UPDATE mediasemana SET frequencia = frequencia + 1 where nome = 'Terça'");
			}elseif($nomediadasemana == "quarta-feira"){
				$res9 = mysqli_query($mysqli,"UPDATE mediasemana SET frequencia = frequencia + 1 where nome = 'Quarta'");
			}elseif($nomediadasemana == "quinta-feira"){
				$res9 = mysqli_query($mysqli,"UPDATE mediasemana SET frequencia = frequencia + 1 where nome = 'Quinta'");
			}elseif($nomediadasemana == "sexta-feira"){
				$res9 = mysqli_query($mysqli,"UPDATE mediasemana SET frequencia = frequencia + 1 where nome = 'Sexta'");
			}elseif($nomediadasemana == "sábado-feira"){
				$res9 = mysqli_query($mysqli,"UPDATE mediasemana SET frequencia = frequencia + 1 where nome = 'Sábado'");
			}else{}
		}
		elseif($quantidade >= 1 && $arq['Data_Hora_Entrada'] != '' && $arq['Data_Hora_Saida'] != '' && $arq['Status'] == 'Desativado'
			   or $quantidade >= 1 && $arq['Data_Hora_Entrada'] != null && $arq['Data_Hora_Saida'] != null && $arq['Status'] == 'Desativado'){
			if($arq3['cod_pessoa'] != 0 && $arq3['cod_visitante'] == 0 && $arq3['cod_aluno'] == 0){
				$codFun = $arq3['cod_pessoa'];

				$res7 = mysqli_query($mysqli,"INSERT INTO validacao(Id_Cartao, Data_Hora_Entrada, Status, CodPessoa) VALUES('$id',CURRENT_TIMESTAMP(),'Ativado',$codFun)");
			}
			elseif($arq3['cod_pessoa'] == 0 && $arq3['cod_visitante'] == 0 && $arq3['cod_aluno'] != 0){
				$codAluno = $arq3['cod_aluno'];

				$res7 = mysqli_query($mysqli,"INSERT INTO validacao(Id_Cartao, Data_Hora_Entrada, Status, CodAluno) VALUES('$id',CURRENT_TIMESTAMP(),'Ativado',$codAluno)");
			}else{
				$codVisit = $arq3['cod_visitante'];

				$res7 = mysqli_query($mysqli,"INSERT INTO validacao(Id_Cartao, Data_Hora_Entrada, Status, CodVisitante) VALUES('$id',CURRENT_TIMESTAMP(),'Ativado',$codVisit)");
			}
		}
		else{
			if($arq3['cod_pessoa'] != 0 && $arq3['cod_visitante'] == 0 && $arq3['cod_aluno'] == 0){
				$codFun = $arq3['cod_pessoa'];

				$res7 = mysqli_query($mysqli,"INSERT INTO validacao(Id_Cartao, Data_Hora_Entrada, Status, CodPessoa) VALUES('$id',CURRENT_TIMESTAMP(),'Ativado',$codFun)");
			}
			elseif($arq3['cod_pessoa'] == 0 && $arq3['cod_visitante'] == 0 && $arq3['cod_aluno'] != 0){
				$codAluno = $arq3['cod_aluno'];

				$res7 = mysqli_query($mysqli,"INSERT INTO validacao(Id_Cartao, Data_Hora_Entrada, Status, CodAluno) VALUES('$id',CURRENT_TIMESTAMP(),'Ativado',$codAluno)");
			}else{
				$codVisit = $arq3['cod_visitante'];

				$res7 = mysqli_query($mysqli,"INSERT INTO validacao(Id_Cartao, Data_Hora_Entrada, Status, CodVisitante) VALUES('$id',CURRENT_TIMESTAMP(),'Ativado',$codVisit)");
			}
		}
		 
		// insert data
		$res = mysqli_query($mysqli,"UPDATE statusled SET Stat = 1 WHERE ID = 0"); 
        

		sleep(2);
		
		$res2 = mysqli_query($mysqli,"UPDATE statusled SET Stat = 0 WHERE ID = 0"); 
	}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style>
		td.lf {
			padding-left: 15px;
			padding-top: 12px;
			padding-bottom: 12px;
		}
	</style>
</head>
 
	<body>	
		<div>
			<form>
				<table  width="452" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
					<tr>
						<td  height="40" align="center"  bgcolor="#10a0c5"><font  color="#FFFFFF">
						<b>Dados</b></font></td>
					</tr>
					<tr>
						<td bgcolor="#f9f9f9">
							<table width="452"  border="0" align="center" cellpadding="5"  cellspacing="0">
								<tr bgcolor="#f2f2f2">
									<td align="left" class="lf">Foto</td>
									<td style="font-weight:bold">:</td>
									<td align="<?php echo $ec;?>"><?php echo $msgft;?><img src="<?php echo "../" . $path;?>" alt="" width="<?php echo $largura;?>" height="<?php echo $altura;?>"></td>
								</tr>
								<tr>
									<td width="113" align="left" class="lf">ID</td>
									<td style="font-weight:bold">:</td>
									<td align="left"><?php echo $cartao;?></td>
								</tr>
								<tr bgcolor="#f2f2f2">
									<td align="left" class="lf">Nome</td>
									<td style="font-weight:bold">:</td>
									<td align="left"><?php echo $nome;?></td>
								</tr>
								<tr>
									<td align="left" class="lf">Telefone</td>
									<td style="font-weight:bold">:</td>
									<td align="left"><?php echo $fone;?></td>
								</tr>
								<tr bgcolor="#f2f2f2">
									<td align="left" class="lf">CPF</td>
									<td style="font-weight:bold">:</td>
									<td align="left"><?php echo $cpf;?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<p style="color:red;"><?php echo $msg;?></p>
	</body>
</html>