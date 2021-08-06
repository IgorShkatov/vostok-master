<?php
		$title="Товары";
		include_once "header.php";
?>
	<h1>Товары</h1>
	<a href="newprod.php">Добавить</a>
	<table class="products">
		<thead>
			<tr>
				<td>Наименование</td>
				<td>Производитель</td>
				<td>Потребление воды</td>
				<td>Вольтаж</td>
				<td>А/ч</td>
				<td>ТХП</td>
				<td>Типоразмер</td>
				<td>Длина</td>
				<td>Ширина</td>
				<td>Высота</td>
				<td>Тип соединения</td>
				<td>Полярность</td>
				<td>Цена поставщика</td>
				<td>Оптовая цена</td>
				<td>Цена</td>
				<td>Завышенная цена</td>
				<td>Изображение</td>
			</tr>
		</thead>
		<tbody>
	<?php
			$result = $mysqli->query("SELECT id,name,idman,wmark,v,ah,thp,size,x,y,z,bolt,pol,distprice,optprice,price,simprice,photo FROM products");
			while ($row = $result->fetch_assoc())
			{
				$man="";
				$size="";
				$bolt="";
				$pol="";

				$res2 = $mysqli->query("SELECT name FROM manufacturers WHERE id=".$row["idman"]);

					while ($row2 = $res2->fetch_assoc())
					{
						$man = $row2["name"];
					}

				switch ($row["size"]) 
				{
					case '1':
						$size = "A";
						break;
					case '2':
						$size = "B";
						break;
					case '3':
						$size = "C";
						break;
					case '4':
						$size = "L2";
						break;
					case '5':
						$size = "L3";
						break;
					case '6':
						$size = "L5";
						break;
					case '7':
						$size = "K";
						break;
					default:
						$size = "0";
						break;
				}

				switch ($row["bolt"]) 
				{
					case '0':
						$bolt = "Конус";
						break;
					case '1':
						$bolt = "Болт";
						break;
					default:
						$bolt = "Н";
						break;
				}

				switch ($row["pol"]) 
				{
					case '0':
						$pol = "Обратная";
						break;
					case '1':
						$pol = "Прямая";
						break;
					default:
						$pol = "Н";
						break;
				}

				echo 	"<tr>
						<td>".$row["name"]."</td>
						<td>".$man."</td>
						<td>".($row["wmark"] == 0 ? "Обычное" : "Низкое")."</td>
						<td>".$row["v"]."</td>
						<td>".$row["ah"]."</td>
						<td>".$row["thp"]."</td>
						<td>".$size."</td>
						<td>".$row["x"]."</td>
						<td>".$row["y"]."</td>
						<td>".$row["z"]."</td>
						<td>".$bolt."</td>
						<td>".$pol."</td>
						<td>".$row["distprice"]."</td>
						<td>".$row["optprice"]."</td>
						<td>".$row["price"]."</td>
						<td>".$row["simprice"]."</td>
						<td><img src=\"../media/img/products/".$row["photo"]."\"></td>
						<td><a href=\"newprod.php?id=".$row["id"]."\">Изменить</a></td><td><a href=\"delprod.php?id=".$row["id"]."\">Удалить</a></td></tr>";
			}
	?>
		</tbody>
	</table>
	<a href="newprod.php">Добавить</a>
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