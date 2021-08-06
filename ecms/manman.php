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
		if(isset($_GET["name"]) && isset($_GET["upd"]))
		{
			$result = "";
			if($_GET["upd"] == 0)
			{
				$result = $mysqli->query("INSERT INTO manufacturers(name) VALUES ('".$_GET["name"]."')");
				if($result)
				{
					header("Location:manufacturers.php?success=1");	
				}
			}
			else
			{
				$result = $mysqli->query("UPDATE manufacturers SET name='".$_GET["name"]."' WHERE id=".$_GET["id"]);
				if($result)
				{
					header("Location:manufacturers.php?success=1");	
				}	
			}
		}
?>