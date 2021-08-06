<?php
 	include_once "db.php";
 	session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
 	if(!isset($_SESSION["role"]))
 	{
 		$_SESSION["role"]=1;
 		$_SESSION["name"]="Гость";
 	}

 	if ($_SESSION["role"] < 3)
 	{
 		header("Location: login.php");
 	}

		if(isset($_GET["name"]) &&	isset($_GET["upd"]) && isset($_GET["idman"]) && isset($_GET["v"]) && isset($_GET["ah"]) && isset($_GET["thp"]) && isset($_GET["x"]) && isset($_GET["y"]) && isset($_GET["z"]) && isset($_GET["bolt"]) && isset($_GET["pol"]) && isset($_GET["distprice"]) && isset($_GET["optprice"]) && isset($_GET["price"]) && isset($_GET["simprice"]) && isset($_GET["photo"]))
		{
			echo "1";
			$result = "";
			if($_GET["upd"] == 0)
			{
				$result = $mysqli->query("INSERT INTO products (name,idman,wmark,v,ah,thp,size,x,y,z,bolt,pol,distprice,optprice,price,simprice,photo) VALUES ('".$_GET["name"]."','".$_GET["idman"]."','".$_GET["wmark"]."','".$_GET["v"]."','".$_GET["ah"]."','".$_GET["thp"]."','".$_GET["size"]."','".$_GET["x"]."','".$_GET["y"]."','".$_GET["z"]."','".$_GET["bolt"]."','".$_GET["pol"]."','".$_GET["distprice"]."','".$_GET["optprice"]."','".$_GET["price"]."','".$_GET["simprice"]."','".$_GET["photo"]."')");
				if($result)
				{
					header("Location:products.php?success=1");
				}
			}
			else
			{
				$result = $mysqli->query("UPDATE products SET name='".$_GET["name"]."',idman='".$_GET["idman"]."',	wmark='".$_GET["wmark"]."',	v='".$_GET["v"]."',	ah='".$_GET["ah"]."',thp='".$_GET["thp"]."',size='".$_GET["size"]."',x='".$_GET["x"]."',y='".$_GET["y"]."',	z='".$_GET["z"]."',	bolt='".$_GET["bolt"]."',	pol='".$_GET["pol"]."',	distprice='".$_GET["distprice"]."',	optprice='".$_GET["optprice"]."',	price='".$_GET["price"]."',		simprice='".$_GET["simprice"]."',photo='".$_GET["photo"]."'	 WHERE id=".$_GET["id"]);
				if($result)
				{
					header("Location:products.php?success=1");	
				}
				else
				{
					echo $mysqli->error;
				}	
			}
		}
?>