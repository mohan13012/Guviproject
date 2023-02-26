<?php
session_start();


if(isset($_POST['login'])){

	
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	if($username == 'my_username' && $password == 'my_password'){

		
		$_SESSION['username'] = $username;

		
		header('Location: homepage.php');
		exit;
	}
	else{
		
		echo "Incorrect username or password";
	}
}
?>
