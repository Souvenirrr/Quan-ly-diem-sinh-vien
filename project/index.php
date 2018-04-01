<?php
if(isset($_COOKIE['msv'])){
		header('location: file/home.php');
	}
	require_once 'file/connect.php';
	require_once 'file/login.php';
?>



<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
<body>
	<form action="" method="post">
		<h1>Đăng nhập</h1>
		<input type="text" name="username" placeholder="username"/>
		<input type="password" name="password" placeholder="password"/>
		<input type="submit" name="submit" value="Đăng nhập"/>
	</form>
</body>
</html>