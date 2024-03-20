<?php
require 'database.php';
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM visitante where cod = ?";
$q = $pdo->prepare($sql);
$q->execute(array($id));
$data = $q->fetch(PDO::FETCH_ASSOC);
Database::disconnect();
?>

<!DOCTYPE html>
<html lang="en">
<html>

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

		textarea {
			resize: none;
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
	</style>

	<title>Edit : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>

</head>

<body>

	<h2 align="center">NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</h2>

	<div class="container">

		<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
			<div class="row">
				<h3 align="center">Edit User Data</h3>
			</div>

			<form class="form-horizontal" action="user data edit tb.php" method="post">
				<input type="hidden" name="id" value="<?php echo $data['cod']; ?>">
				<div class="control-group">
					<label class="control-label">Nome</label>
					<div class="controls">
						<input name="nome" type="text" placeholder="" value="<?php echo $data['nome']; ?>" required>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Telefone</label>
					<div class="controls">
						<input name="fone" type="number" minlength="11" maxlength="11" placeholder="" value="<?php echo $data['fone']; ?>" required>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">CPF</label>
					<div class="controls">
						<input name="cpf" type="number" minlength="11" maxlength="11" placeholder="" value="<?php echo $data['cpf']; ?>" required>
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-success">Update</button>
					<a class="btn" href="user data.php">Back</a>
				</div>
			</form>
		</div>
	</div> <!-- /container -->

	<script>
		var g = document.getElementById("defaultGender").innerHTML;
		if (g == "Male") {
			document.getElementById("mySelect").selectedIndex = "0";
		} else {
			document.getElementById("mySelect").selectedIndex = "1";
		}
	</script>
</body>

</html>