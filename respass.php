<?php
	include_once "db.php";
	if($_POST["rescode"])
	{
		$result = $mysqli->query("SELECT id,passaccept FROM users WHERE passaccept='".$_POST["rescode"]."'");
		if($result)
		{
			while ($row = $result->fetch_assoc())
			{
				if($_POST["rescode"] == $row["passaccept"])
				{
					if($_POST["respass"] == $_POST["represpass"])
					{
						$password = password_hash($_POST["respass"],PASSWORD_DEFAULT);
						$mysqli->query("UPDATE users SET passaccept='',password='".$password."' WHERE id = '".$row["id"]."'");
						header("Location:/?accpass=1");
					}
					else
					{
						header("Location:/?errpass=Пароли не совпадают!");
					}
				}

			}
		}
		else
		{
			header("Location:/?errpass=Пользователь не найден!");
		}
	}
?>