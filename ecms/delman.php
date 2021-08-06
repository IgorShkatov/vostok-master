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
 	if(isset($_GET["id"]))
	{
		$result = $mysqli->query("UPDATE manufacturers SET isdelete='1' WHERE id=".$_GET["id"]);
		if($result)
		{
			header("Location:manufacturers.php?success=1");
		}
	}
?>