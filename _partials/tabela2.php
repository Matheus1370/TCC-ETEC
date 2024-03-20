<?php
?>
<?php
?>
<?php?>

<?php
$res = $mysqli->query("SELECT Id_Cartao, COUNT(*) AS Total, CodPessoa, CodAluno, CodVisitante FROM validacao WHERE Status = 'Desativado' GROUP BY Id_Cartao LIMIT 10;");

?>

<table border="1" cellpadding="10" class="consulta consulta1">
    <thead>
        <tr><th colspan='5' class="first">Vezes que esteve no campus</th></tr>
        <tr>
            <th>Cartão</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Fone</th>
            <th>Vezes</th>
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
                    <td><?php echo $arq['Total'];?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </thead>
</table>