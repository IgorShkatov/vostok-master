<?php

	session_start();
	if($_GET)
	{
		if($_GET["id"] > 0)
		{	
			if(!isset($_SESSION["prods"]))
			{
				$_SESSION["prods"] = [];
			}
			$_SESSION["prods"] = array_push_assoc($_SESSION["prods"],$_GET["id"],1);
		}
	}
		$count = 0;
		foreach ($_SESSION["prods"] as $key => $value )
		{
			$count +=$value;
		}
		echo $count;
	function array_push_assoc($array, $key, $value)
	{
		$array[$key] = $value;
		return $array;
	}
?>