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
	<script src="jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#getUID").load("UIDContainer.php");
			setInterval(function() {
				$("#getUID").load("UIDContainer.php");
			}, 500);
		});
	</script>
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

		body{
			display: flex;
			align-items: center;
			flex-direction: column;
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
			font-size: 23px;		}

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

		td.lf {
			padding-left: 15px;
			padding-top: 12px;
			padding-bottom: 12px;
		}
	</style>

</head>

<body>
	<ul class="topnav">
		<li><a href="home.php">Home</a></li>
		<li><a href="user data.php">User Data</a></li>
		<li><a href="registration.php">Registration</a></li>
		<li><a class="active" href="read tag.php">Read Tag ID</a></li>
	</ul>

	<br>

	<h3 align="center" id="blink">Passe o cartão</h3>

	<p id="getUID" hidden></p>

	<br>

	<div id="show_user_data">
		<form>
			<table width="452" border="1" bordercolor="#10a0c5" align="center" cellpadding="0" cellspacing="1" bgcolor="#000" style="padding: 2px">
				<tr>
					<td height="40" align="center" bgcolor="#10a0c5">
						<font color="#FFFFFF">
							<b>Dados</b>
						</font>
					</td>
				</tr>
				<tr>
					<td bgcolor="#f9f9f9">
						<table width="452" border="0" align="center" cellpadding="5" cellspacing="0">
							<tr>
								<td width="113" align="left" class="lf">ID</td>
								<td style="font-weight:bold">:</td>
								<td align="left">--------</td>
							</tr>
							<tr bgcolor="#f2f2f2">
								<td align="left" class="lf">Nome</td>
								<td style="font-weight:bold">:</td>
								<td align="left">--------</td>
							</tr>
							<tr>
								<td align="left" class="lf">Telefone</td>
								<td style="font-weight:bold">:</td>
								<td align="left">--------</td>
							</tr>
							<tr bgcolor="#f2f2f2">
								<td align="left" class="lf">CPF</td>
								<td style="font-weight:bold">:</td>
								<td align="left">--------</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</div>

	<script>
		var myVar = setInterval(myTimer, 1000);
		var myVar1 = setInterval(myTimer1, 1000);
		var oldID = "";
		clearInterval(myVar1);

		function myTimer() {
			var getID = document.getElementById("getUID").innerHTML;
			oldID = getID;
			if (getID != "") {
				myVar1 = setInterval(myTimer1, 500);
				showUser(getID);
				clearInterval(myVar);
			}
		}

		function myTimer1() {
			var getID = document.getElementById("getUID").innerHTML;
			if (oldID != getID) {
				myVar = setInterval(myTimer, 500);
				clearInterval(myVar1);
			}
		}

		function showUser(str) {
			if (str == "") {
				document.getElementById("show_user_data").innerHTML = "";
				return;
			} else {
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("show_user_data").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "read tag user data.php?id=" + str, true);
				xmlhttp.send();
			}
		}

		var blink = document.getElementById('blink');
		setInterval(function() {
			blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
		}, 750);
	</script>
</body>

</html>