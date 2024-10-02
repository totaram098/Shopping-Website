<?php
	session_start();
	if (isset($_SESSION["username"])) {
		header("location:shop.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<style type="text/css">
		h1{
			box-shadow: 2px 2px 3px navy;
			background: yellowgreen;
			color: navy;
			padding: 10px;
		}
		.container{
			width: 400px;
		}
		fieldset{
			border: 2px solid yellowgreen;
			color: navy;
		}
		p{
			color: orangered;
		}
	</style>
</head>
<body>
	<center>
		<div class="container">
			<h1>Login Page</h1>
			<form action="login_process.php" method="POST">
				<fieldset>
					<legend>
						LOGIN HERE
					</legend>
					<p>
						<?php 
                            echo $_REQUEST['msg']??"";
						?>
					</p>
					<table>
						<tr>
							<td>Username : </td>
							<td><input type="text" name="username"></td>
						</tr>
						<tr>
							<td>Passowrd : </td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="login" value="Login">
							</td>
						</tr>
					</table>
				</fieldset>
			</form>
		</div>
	</center>
</body>
</html>