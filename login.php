<?php
include_once "db.php";
session_start();

if(isset($_POST))
{
	$result = $mysqli->query("SELECT id,name,mail,password,regdate,role,town,address,phone FROM users WHERE mail='".$_POST["mail"]."'");
	if(mysqli_num_rows($result) > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			if(password_verify($_POST["pass"],$row["password"]))
			{
				$_SESSION["part"] = $row["id"];
				$_SESSION["name"] = $row["name"];
				$_SESSION["role"] = $row["role"];
				$_SESSION["regdate"] = $row["regdate"];
				$_SESSION["mail"] = $row["mail"];
				$_SESSION["town"] = $row["town"];
				$_SESSION["address"] = $row["address"];
				$_SESSION["phone"] = $row["phone"];
				echo "0";
			}
			else
			{
				echo "1";
			}
		}
	}
	else
	{
		echo "2";
	}
}