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

		if(isset($_GET["name"]) && isset($_GET["upd"]) && isset($_GET["mail"]) && isset($_GET["role"])&& isset($_GET["opt"])&& isset($_GET["town"])&& isset($_GET["address"])&& isset($_GET["phone"]))
		{
			$result = "";
			if($_GET["upd"] == 0)
			{
				$result = $mysqli->query("INSERT INTO users(name,mail,role,opt,town,address,phone) VALUES ('".$_GET["name"]."','".$_GET["mail"]."','".$_GET["role"]."','".$_GET["opt"]."','".$_GET["town"]."','".$_GET["address"]."','".$_GET["phone"]."')");
				if($result)
				{
					header("Location:users.php?success=1");	
				}
			}
			else
			{
				$result = $mysqli->query("UPDATE users SET name='".$_GET["name"]."', mail='".$_GET["mail"]."',role='".$_GET["role"]."',opt='".$_GET["opt"]."',town='".$_GET["town"]."', address='".$_GET["address"]."',phone='".$_GET["phone"]."' WHERE id=".$_GET["id"]);
				if($result)
				{
					header("Location:users.php?success=1");	
				}	
			}
		}
?>