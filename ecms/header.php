<?php
 	include_once "db.php";
 	session_start();
 	if(!isset($_SESSION["role"]))
 	{
 		$_SESSION["role"]=1;
 		$_SESSION["name"]="Гость";
 	}
 	if ($_SESSION["role"] < 3)
 	{
 		header("Location: login.php");
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="keywords" content="ключевые слова" />
	<meta name="description" content="ключевые слова" />
</head>
<body>
<main>
	<header>
		<nav>
			<a href="manufacturers.php">Производители</a>
			<a href="products.php">Товары</a>
			<a href="users.php">Пользователи</a>
			<a href="zakaz.php">Заказы</a>
			<a href="logout.php">Выход</a>
		</nav>
	</header>