<?php
	if($_GET)
	{
		if($_GET["id"] > 0)
		{
		
		}
		else
		{ 
			header("Location: index.php");
		}
	}
	else
	{
		header("Location: index.php");
	}

		$title="Товар";
		$nav = 0;
		include_once "header.php";
?>
<section>
<?php
		$result = $mysqli->query("SELECT name,idman,wmark,v,ah,thp,x,y,z,bolt,pol,simprice,price,photo FROM products WHERE id = '".$_GET["id"]."'");
		while ($row = $result->fetch_assoc())
		{
			$wmarktext = "";
			$tsizetext = "";
			$conntext = "";
			$poltext = "";
			switch ($row["size"]) 
			{
				case 1:
					$tsizetext = "A";
					break;
				case 2:
					$tsizetext = "B";
					break;
				case 3:
					$tsizetext = "C";
					break;
				case 4:
					$tsizetext = "L2";
					break;
				case 5:
					$tsizetext = "L3";
					break;
				case 6:
					$tsizetext = "L5";
					break;
				case 7:
					$tsizetext = "K";
					break;
				
				default:
					$tsizetext = "A";
					break;
			}

			if($row["bolt"])
			{
				$conntext = "Болт";
			}
			else
			{
				$conntext = "Конус";
			}

			if($row["wmark"])
			{
				$wmarktext = "Низкий";
			}
			else
			{
				$wmarktext = "Нормальный";
			}

			if($row["pol"])
			{
				$poltext = "Прямая";
			}
			else
			{
				$poltext = "Обратная";
			}
			echo '<div class="showproduct">
				<div>
					<img src="./media/img/products/'.$row["photo"].'">
				</div>
				<div>
					<h2>'.$row["name"].'</h2>
					<div class="showdesc">
						<p><span class="showparam">V:</span> '.$row["v"].'</p>
						<p><span class="showparam">Расход воды:</span> '.$wmarktext.'</p>
						<p><span class="showparam">А/ч:</span> '.$row["ah"].'</p>
						<p><span class="showparam">ТПХ:</span> '.$row["thp"].'</p>
						<p><span class="showparam">Типоразмер:</span>'.$tsizetext.'</p>
						<p><span class="showparam">Размер:</span> '.$row["x"].'x'.$row["y"].'x'.$row["z"].'</p>
						<p><span class="showparam">Тип вывода:</span> '.$conntext.'</p>
						<p><span class="showparam">Полярность:</span> '.$poltext.'</p>
						<p><span class="showparam">Цена:</span> '.$row["price"].'р</p>
					</div>
				</div>
			</div>';
		}
?>


</section>
<?php
		include_once "footer.php";
?>