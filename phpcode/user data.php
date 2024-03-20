<?php
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<style>
		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin: 0;
			padding: 0;
			background-color: #e32636;
			width: 100%;
			display: flex;
			justify-content: space-around;
			height: 100px;
			align-items: center;
			box-shadow: 0 0 3px 0 #333;
		}

		ul.topnav li {
			float: left;
		}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			font-size: 20px;
			transition: .3s;
			font-weight: 500;
		}

		ul.topnav li a:hover:not(.active) {
			font-size: 23px;
		}

		ul.topnav li a.active {
			background-color: #333;
		}

		ul.topnav li.right {
			float: right;
		}

		@media screen and (max-width: 600px) {

			ul.topnav li.right,
			ul.topnav li {
				float: none;
			}
		}

		.table {
			margin: auto;
			width: 90%;
		}

		thead {
			color: #FFFFFF;
		}
	</style>
</head>

<body>
	<ul class="topnav">
		<li><a href="home.php">Home</a></li>
		<li><a class="active" href="user data.php">User Data</a></li>
		<li><a href="registration.php">Registration</a></li>
		<li><a href="read tag.php">Read Tag ID</a></li>
	</ul>
	<br>
	<div class="container">
		<div class="row">
			<h3>Tabela dos visitantes</h3>
		</div>
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr bgcolor="#10a0c5" color="#FFFFFF">
						<th>Nome</th>
						<th>Telefone</th>
						<th>CPF</th>
						<th>Foto</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include 'database.php';
					$pdo = Database::connect();
					$sql = 'SELECT * FROM visitante ORDER BY nome ASC';
					foreach ($pdo->query($sql) as $row) {
						echo '<tr>';
						echo '<td>' . $row['nome'] . '</td>';
						echo '<td>' . $row['fone'] . '</td>';
						echo '<td>' . $row['cpf'] . '</td>';
						echo '<td> <img src="' . $row['path'] . '" width="220px" height="300px"></td>';
						echo '<td><a class="btn btn-success" href="user data edit page.php?id=' . $row['cod'] . '">Alterar</a>';
						echo ' ';
						echo '<a class="btn btn-danger" href="user data delete page.php?id=' . $row['cod'] . '">Excluir</a>';
						echo '</td>';
						echo '</tr>';
					}
					Database::disconnect();
					?>
				</tbody>
			</table>
		</div>
	</div> <!-- /container -->
</body>

</html>