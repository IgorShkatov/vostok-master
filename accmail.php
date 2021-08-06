<?php
	include_once "db.php";
	if($_GET)
	{
		if($_GET["code"])
		{
			$result = $mysqli->query("SELECT id,mailaccept FROM users WHERE mailaccept=\"".$_GET["code"]."\"");
			while ($row = $result->fetch_assoc())
			{
				if($_GET["code"] == $row["mailaccept"])
				{
					$mysqli->query("UPDATE users SET mailaccept='' WHERE id = ".$row["id"]);
					header("Location:/?accmail=1");
				}
			}
		}
	}
?>