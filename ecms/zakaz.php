<?php
		$title="Заказы";
		include_once "header.php";
		$new = "";
		if(isset($_GET["id"]))
		{
			$new = htmlspecialchars($_GET["id"]);
		}
?>
<section>
	<h1>Заказы</h1>
<?php 
			$result = $mysqli->query("SELECT userid,zakaz,zakazdate FROM zakaz ORDER BY id DESC");
			if(mysqli_num_rows($result) > 0)
			{
				echo "<table>
			<thead>
				<tr>
					<td>Дата заказа</td>
					<td>Заказчик</td>
					<td>Товар</td>
					<td>Количество</td>
					<td>Цена</td>
				</tr>
			</thead><tbody>";
				while ($row = $result->fetch_assoc())
				{
					$count = count($row["zakaz"]) + 1;
					$counter = 0;
					$zakaz = json_decode($row["zakaz"]);
					foreach ($zakaz as $key => $value )
					{
						$price = 0;
						$result2 = $mysqli->query("SELECT id,name,price FROM products WHERE id = '".$key."'");
						while ($row2 = $result2->fetch_assoc())
						{
							if($value>0)
							{
								$price+=$row2["price"] * $value;
								echo '<tr>';
								echo ($counter == 0) ?  "<td rowspan=\"$count\">".$row["zakazdate"]."</td><td rowspan=\"$count\">".$row["userid"]."</td>" :  ""; 
								echo '<td>'.$row2["name"].'</td>
								<td>'.$value.'</td>
								<td>'.$row2["price"].'р</td>
								</tr>';
								$counter++;
							}
						}
						echo "<tr><td colspan=\"2\">Общая сумма:</td><td>".$price."р</td></tr>";
					}
				}
				echo "</tbody></table>";
			}
?>
</section>
<?php
	include_once "footer.php";
?>