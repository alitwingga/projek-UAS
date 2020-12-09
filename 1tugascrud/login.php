<?php
session_start();
include_once("config.php");
if(isset($_POST['login_button'])) {
	$user_username = trim($_POST['username']);
	$user_password = trim($_POST['password']);
	
	$sql = "SELECT * FROM data_login WHERE username='$user_username'";
	$resultset = mysqli_query($connect, $sql) or die("database error:". mysqli_error($conn));
	$row = mysqli_fetch_assoc($resultset);	
		
	if($row['password']==$user_password){				
		echo "ok";
		$_SESSION['user_session'] = $row['id'];
		$_SESSION['id']     		= $row['id'];
		$_SESSION['username']   	= $row['username'];
		$_SESSION['level']     		= $row['level'];
	} else {				
		echo "email or password does not exist."; // wrong details 
	}		
}
?>