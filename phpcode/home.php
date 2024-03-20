<?php
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
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

		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
	</style>
</head>

<body>
	<ul class="topnav">
		<li><a class="active" href="home.php">Home</a></li>
		<li><a href="user data.php">User Data</a></li>
		<li><a href="registration.php">Registration</a></li>
		<li><a href="read tag.php">Read Tag ID</a></li>
	</ul>
	<br>

	<img src="home ok ok.jpg" alt="" style="width:55%;">
</body>

</html>