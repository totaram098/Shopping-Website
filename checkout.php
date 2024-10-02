<?php
	session_start();
	if (!isset($_SESSION["username"])) {
		header("location:login.php?msg=Please Login First...!");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>shop</title>
	<link rel="stylesheet" href="grid_layout.css">
	<style type="text/css">
		.banner{
			background: yellowgreen;
			color: navy;
			box-shadow: 2px 2px 3px navy;
			padding: 20px;
		}
		.welcome,.footer{
			background: yellowgreen;
			color: navy;
			padding: 20px;
			font-size: 20px;
		}
		button{
			background: yellowgreen;
			color: navy;
			padding: 5px;
			margin-top: -4px;
			border: 1px solid navy;
		}
		ul{
			list-style: none;
			background: yellowgreen;
			height: 100%;
			margin: 0;
			border: 2px solid navy;
			padding-top: 20px;
		}
		ul li{
			margin: 20px auto;
		}
		.category{
			justify-content: space-evenly;
		}
		.category>div{
			border: 2px solid grey;
			height: 200px;
			margin: 10px;
/*			width: 200px;*/
		}
		.category>div:hover{
			border: 4px solid grey;

		}

		a{
		  text-decoration: none;
			color: navy;
			font-size: 20px;

		}
		.middlePart{
			background: yellowgreen;
			border: 1px solid navy;
		}
		.category a {
		  display: block;
		  height: 100%;
		  text-align: center;
		  align-content: center;
		}
		.side_category{
			border: 2px solid grey;
		}
		.bill{
			padding: 10px;
		}
	</style>
</head>
<body>
	<div>
		<h1 align="center" class="banner">BANNER</h1>
			
		<div class="welcome">
			Welcome <?php echo $_SESSION["username"]; ?>
			<button style="float: right;"><a href="logout.php">Logout</a></button>
		</div>
		<div class="row">
			<div class="col-2 side_category">
				<ul>
					<h2>CATEGORIES</h2>
					<li>
						<a href="menFashoin.php">
							Men`s Fashion
						</a>
					</li>
					<li>
						<a href="womenFashoin.php">
							Women`s Fashion
						</a>
					</li>
					<li>
						<a href="grocery.php">
							Groceries
						</a>
					</li>
					<li>
						<a href="healthAndBeauty.php">
							Health & Beauty
						</a>
					</li>
				</ul>
			</div>
			<div class="col-10 middlePart">
				<h4 align="center">CHECKOUT</h4>
				<table border="1" cellpadding="5" cellspacing="2" align="center">
					<tr>
						<th>Item Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
					</tr>
					<?php
					$total_bill = 0; 
					foreach ($_SESSION as $key => $item_data) {
						echo "<tr>";
						if (is_array($item_data)) {
							$price = $item_data["price"];
							$total_bill+=$price;
							$quantity = $item_data["quantity"];
							echo "<td>$key</td>";
							echo "<td>".($price/$quantity)."</td>";
							echo "<td>$quantity</td>";
							echo "<td>$price</td>";
						}
						echo "</tr>";
					}

					?>
				</table>
				<h3 align="right" class="bill">Total Bill is : <?php echo $total_bill; ?></h3>
			</div>
		</div>
		<div style="text-align:center;" class="footer">
			FOOTER
			<button style="float: right;"><a href="checkout.php">Checkout</a></button>
		</div>
	</div>
</body>
</html>