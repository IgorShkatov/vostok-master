<?php
		$title="Производители";
		include_once "header.php";
?>
	<h1>Производители</h1>
	<a href="newman.php">Добавить</a>
	<table>
		<thead>
			<tr>
				<td>Наименование</td>
				<td>Изменение</td>
				<td>Удаление</td>
			</tr>
		</thead>
		<tbody>
	<?php
			$result = $mysqli->query("SELECT id,name FROM manufacturers");
			while ($row = $result->fetch_assoc())
			{
				echo 	"<tr><td>".$row["name"]."</td><td><a href=\"newman.php?id=".$row["id"]."\">Изменить</a></td><td><a href=\"delman.php?id=".$row["id"]."\">Удалить</a></td></tr>";
			}
	?>
		</tbody>
	</table>
	<a href="newman.php">Добавить</a>
<?php
	include_once "footer.php";
	if(isset($_GET["success"]))
	{
		if($_GET["success"] == 1)
		{
			echo "<script type=\"text/javascript\">
				openaccept(\"Операция успешно выполнена!\");
			</script>";
		}
	}
?>