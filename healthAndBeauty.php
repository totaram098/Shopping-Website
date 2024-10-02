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
				<h4 align="center">HEALTH AND BEAUTY</h4>
				<p style="color: orangered;text-align: center;font-size: 20px;">
					<?php echo $_REQUEST['msg']??""; ?>
				</p>
				<div action="" class="row item"  align="center">
					<form class="col-3" method="POST">
						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6ul3u2K8n5pH7GccKYIhhWjb13yrewbjMZA&s" alt="img">
						<h5>Makeup Kit</h5>
						<h5>Price : 5000</h5>
						<span>Quantity</span>
						<input type="number" name="quantity" min="1">
						<input type="hidden" name="price" value="5000">
						<input type="hidden" name="type" value="Makup Kit">
						<input type="submit" name="submit" value="Add to Cart">
					</form>
					<form class="col-3" method="POST">
						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEB6Qjm-w8VXmriYTo88vFOm5THpAJCN7PNQ&s" alt="img">
						<h5>Beauty Tool</h5>
						<h5>Price : 4000</h5>
						<span>Quantity</span>
						<input type="number" name="quantity" min="1">
						<input type="hidden" name="price" value="4000">
						<input type="hidden" name="type" value="Beauty Tool">
						<input type="submit" name="submit" value="Add to Cart">
					</form>
					<form class="col-3" method="POST">
						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKlGPfHIlF-AwoUPziRr-CKpw7ZA3ia9WLNg&s" alt="img">
						<h5>Sun Block Cream</h5>
						<h5>Price : 450</h5>
						<span>Quantity</span>
						<input type="number" name="quantity" min="1">
						<input type="hidden" name="price" value="450">
						<input type="hidden" name="type" value="Sun Block Cream">
						<input type="submit" name="submit" value="Add to Cart" formaction=" ">
					</form>
					<form class="col-3" method="POST">
						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrv38Ob1QI4GDJG2fHpC1U6Y2q-5khHUZSQQ&s" alt="img">
						<h5>Fash Wash Cream</h5>
						<h5>Price : 780</h5>
						<span>Quantity</span>
						<input type="number" name="quantity" min="1">
						<input type="hidden" name="price" value="780">
						<input type="hidden" name="type" value="Fash Wash Cream">
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