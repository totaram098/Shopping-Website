<?php
	session_start();
	// $user = "Totaram";
	// $pass = "9876";
	$users = [
		"user_1"=>[
			"username"=>"Totaram",
			"password"=>"9876",
		],
		"user_2"=>[
			"username"=>"Jawhar lal",
			"password"=>"123",
		],
		"user_3"=>[
			"username"=>"Ali",
			"password"=>"1234",
		],
		"user_4"=>[
			"username"=>"Dolat",
			"password"=>"345",
		],
	];
if (isset($_POST['login'])) {
	if ($_POST['username']=="" || $_POST['password']=="") {
		header("location:login.php?msg=Please Enter Username/Password");
		exit();
	}
	foreach ($users as $user_id => $user) {
		if ($_POST['username']==$user["username"] && $_POST['password']==$user["password"]) {
			$_SESSION['username'] = $user["username"];
			$_SESSION['password'] = $user["password"];
			header("location:shop.php");
			exit();
		}
	}
	header("location:login.php?msg=Invalid Username/Password");
	
}









?>