<?php
	include_once "db.php";
	session_start();
	if($_SESSION["role"] > 1)
	{
		if(isset($_POST))
		{
			$mysqli->query("UPDATE users SET name='".$_POST["name"]."',phone='".$_POST["phone"]."',town='".$_POST["town"]."',address='".$_POST["address"]."' WHERE id = ".$_POST["id"]);
			$_SESSION["name"] = $_POST["name"];
			$_SESSION["town"] =$_POST["town"];
			$_SESSION["address"] = $_POST["address"];
			$_SESSION["phone"] = $_POST["phone"];
			echo "0";
		}
	}
?>