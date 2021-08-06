<?php
	include_once "db.php";
	session_start();
	ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
if(isset($_GET["dost"]))
{
	if($_SESSION["role"] > 1)
	{
		$zakaz = json_encode($_SESSION["prods"]);
			 
		if($mysqli->query("INSERT INTO zakaz (userid,zakaz,dost) VALUES('".$_SESSION["part"]."','".$zakaz."','".$_GET["dost"]."')"))
		{

			$count = 0;
			foreach ($_SESSION["prods"] as $key => $value )
			{
				$count +=$value;
			}

			if($count > 0)
			{
				$code = '<table>
				<thead>
					<tr>
						<td>Наименование</td>
						<td>Количество</td>
						<td>Цена</td>
					</tr>
				</thead>';
				$price = 0;
				foreach ($_SESSION["prods"] as $key => $value )
				{
					$result = $mysqli->query("SELECT id,name,price FROM products WHERE id = '".$key."'");
					while ($row = $result->fetch_assoc())
					{
						if($_SESSION["prods"][$row["id"]]>0)
						{
							$price+=$row["price"] * $_SESSION["prods"][$row["id"]];
							$code.= '<tr>
							<td>'.$row["name"].'</td>
							<td>'.$value.'</td>
							<td>'.$row["price"].'р</td>
							</tr>';
						}
					}
				}
				$code.= '<tr>
					<td colspan="2">Общая сумма:</td>
					<td>'.$price.'р </td>
				</tr></table>';

				$_SESSION["prods"] = [];
				$headers = "From: sales4@tdtsv.ru\r\n";
				$headers .= "Reply-To: sales4@tdtsv.ru\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
				mail("sales4@tdtsv.ru", "Новый заказ", $code,$headers);
				header("Location:/?cart=1");
			}
		}
	}
}
?>