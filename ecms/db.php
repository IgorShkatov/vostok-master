<?php
	$mysqli = new mysqli('localhost','root','d1I3m3A9n6','tdtsv');

	//check_connection();


	function check_connection()
	{
		global $mysqli;
		if($mysqli->connect_errno)
		{
			//DebugLog(database_connection_error."	".$mysqli->connect_error."	".$mysqli->connect_errno,LOG_TYPE_ERROR);
			die();
		}
	}

	function check_query($err)
	{
		global $mysqli;
		if($mysqli->errno)
		{
			//DebugLog($err."	".$mysqli->errno."	".$mysqli->errno,LOG_TYPE_ERROR);
			die();
		}
	}
?>
