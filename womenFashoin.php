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
		*{
			color: navy;
		}
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
		img{
			width: 99%;
			height: 300px;
			object-fit: cover;
		}
		.item form{
			padding: 10px;
			border: 1px solid navy;
			margin: 5px;

		}
	</style>
</head>
<body>

	<?php
	if (isset($_POST['submit'])) {
		$type = $_POST['type'];
		$price = $_POST['price'];
		$quantity = ($_POST['quantity']!="")?$_POST['quantity']:"0";
		if ($quantity) {
			
			if (isset($_SESSION[$type])) {
				$_SESSION[$type]['price'] += ($price * $quantity);

				$prev_quantity = ($_SESSION[$type]['quantity']=="")?0:$_SESSION[$type]['quantity']; 

				$_SESSION[$type]['quantity'] = $prev_quantity + $quantity; 
			}
			else{
				$_SESSION[$type]['price'] = ($price * $quantity); 
				$_SESSION[$type]['quantity'] = $_POST['quantity']; 
			}

			if(isset($_SESSION[$type])){
				// header("location:manFashion.php?msg=Item Added to Cart Successfully..!");
				$_REQUEST["msg"] = "Item Added to Cart Successfully..!";
			}else{
				header("location:manFashion.php?msg=Try Again..!");
				$_REQUEST["msg"] = "Try Again..!";
			}
		}else{
			$_REQUEST["msg"] = "Quantity can not be zero..!";
		}
	}
	?>
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
				<h4 align="center">WOMEN`S FASHION</h4>
				<p style="color: orangered;text-align: center;font-size: 20px;">
					<?php echo $_REQUEST['msg']??""; ?>
				</p>
				<div action="" class="row item"  align="center">
					<form class="col-3" method="POST">
						<img src="https://i.pinimg.com/564x/fd/f2/10/fdf210c4f6430aae7034a2f3c464dde1.jpg" alt="img">
						<h5>Shalwar Kameez</h5>
						<h5>Price : 3500</h5>
						<span>Quantity</span>
						<input type="number" name="quantity" min="1">
						<input type="hidden" name="price" value="3500">
						<input type="hidden" name="type" value="Shalwar Kameez">
						<input type="submit" name="submit" value="Add to Cart">
					</form>
					<form class="col-3" method="POST">
						<img src="https://m.media-amazon.com/images/I/71SX9ppm-YL._AC_UY1100_.jpg" alt="img">
						<h5>Saree</h5>
						<h5>Price : 10000</h5>
						<span>Quantity</span>
						<input type="number" name="quantity" min="1">
						<input type="hidden" name="price" value="10000">
						<input type="hidden" name="type" value="Saree">
						<input type="submit" name="submit" value="Add to Cart">
					</form>
					<form class="col-3" method="POST">
						<img src="https://image.made-in-china.com/202f0j00FjGaEiqtOLUA/Fashion-Lady-Customized-Small-Round-Head-Bow-Casual-Comfortable-Flat-Shoes-Women.webp" alt="img">
						<h5>Flat Shoes</h5>
						<h5>Price : 4450</h5>
						<span>Quantity</span>
						<input type="number" name="quantity" min="1">
						<input type="hidden" name="price" value="4450">
						<input type="hidden" name="type" value="Flat Shoes">
						<input type="submit" name="submit" value="Add to Cart" formaction=" ">
					</form>
					<form class="col-3" method="POST">
						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTe94qEsPnKbhfKlyvcWv5qxII9ov5b_7d9lQ&s" alt="img">
						<h5>Jeans</h5>
						<h5>Price : 1890</h5>
						<span>Quantity</span>
						<input type="number" name="quantity" min="1">
						<input type="hidden" name="price" value="1890">
						<input type="hidden" name="type" value="Jeans">
						<input type="submit" name="submit" value="Add to Cart" formaction=" ">
					</form>
				</div>
			</div>
		</div>
		<div style="text-align:center;" class="footer">
			FOOTER
			<button style="float: right;"><a href="checkout.php">Checkout</a></button>
		</div>
	</div>
</body>
</html>