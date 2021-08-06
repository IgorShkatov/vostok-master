<?php
		$title="Vostok TS";
		include_once "header.php";
		$new = "";
		if(isset($_GET["id"]))
		{
			$new = htmlspecialchars($_GET["id"]);
		}
?>
<section class="former">
	<h1>Товар</h1>
	<form action="manprod.php">
	
	<?php
		if(isset($_GET["id"]))
		{
			$result = $mysqli->query("SELECT id,name,idman,wmark,v,ah,thp,size,x,y,z,bolt,pol,distprice,optprice,price,simprice,photo FROM products WHERE id=".$new);
			while ($row = $result->fetch_assoc())
			{
				echo '
					<label for="name">Наименование:</label>
					<input type="text" id="name" value="'.$row["name"].'" name="name"><br>

					<label for="idman">Производитель:</label>
					<select name="idman">
					';
						$res2 = $mysqli->query("SELECT id,name FROM manufacturers");

						while ($row2 = $res2->fetch_assoc())
						{
							echo '<option value="'.$row2["id"].'" '.($row["idman"] == $row2["id"] ? 'selected' : '').'>'.$row2["name"].'</option>';
						}
					echo '
					</select><br>

					<label for="v">Вольтаж</label>
					<input type="number" id="v" value="'.$row["v"].'" name="v"><br>

					<label for="ah">А/ч</label>
					<input type="number" id="ah" value="'.$row["ah"].'" name="ah"><br>

					<label for="thp">Типоразмер</label>
					<select name="thp">
						<option value="1" '.($row["size"] == 1 ? 'selected' : '').'>A</option>
						<option value="2" '.($row["size"] == 2 ? 'selected' : '').'>B</option>
						<option value="3" '.($row["size"] == 3 ? 'selected' : '').'>C</option>
						<option value="4" '.($row["size"] == 4 ? 'selected' : '').'>L2</option>
						<option value="5" '.($row["size"] == 5 ? 'selected' : '').'>L3</option>
						<option value="6" '.($row["size"] == 6 ? 'selected' : '').'>L5</option>
						<option value="7" '.($row["size"] == 7 ? 'selected' : '').'>K</option>
					</select><br>

					<label for="x">Длина</label>
					<input type="number" id="x" value="'.$row["x"].'" name="x"><br>

					<label for="y">Ширина</label>
					<input type="number" id="y" value="'.$row["y"].'" name="y"><br>

					<label for="z">Высота</label>
					<input type="number" id="z" value="'.$row["z"].'" name="z"><br>

					<label for="bolt">Тип соединения</label>
					<select name="bolt">
						<option value="0" '.($row["bolt"] == 0 ? 'selected' : '').'>Конус</option>
						<option value="1" '.($row["bolt"] == 1 ? 'selected' : '').'>Болт</option>
					</select><br>

					<label for="pol">Полярность</label>
					<select name="pol">
						<option value="0" '.($row["pol"] == 0 ? 'selected' : '').'>Обратная</option>
						<option value="1" '.($row["pol"] == 1 ? 'selected' : '').'>Прямая</option>
					</select><br>

					<label for="distprice">Цена производителя</label>
					<input type="number" id="distprice" value="'.$row["distprice"].'" name="distprice"><br>

					<label for="optprice">Оптовая цена</label>
					<input type="number" id="optprice" value="'.$row["optprice"].'" name="optprice"><br>

					<label for="price">Цена</label>
					<input type="number" id="price" value="'.$row["price"].'" name="price"><br>

					<label for="simprice">Завышенная цена</label>
					<input type="number" id="simprice" value="'.$row["simprice"].'" name="simprice"><br>

					<label for="photo">Имя файла изображения:</label>
					<input type="text" id="photo" value="'.$row["photo"].'" name="photo"><br>


					<input type="hidden" name="upd" value="1">
					<input type="hidden" name="id" value="'.$_GET["id"].'">
				';
			}
		}
		else
		{
			echo '
					<label for="name">Наименование:</label>
					<input type="text" id="name" name="name"><br>

					<label for="idman">Производитель:</label>
					<select name="idman">
					';
						$res2 = $mysqli->query("SELECT id,name FROM manufacturers");

						while ($row2 = $res2->fetch_assoc())
						{
							echo '<option value="'.$row2["id"].'">'.$row2["name"].'</option>';
						}
					echo '
					</select><br>

					<label for="v">Вольтаж</label>
					<input type="number" id="v" name="v"><br>

					<label for="ah">А/ч</label>
					<input type="number" id="ah" name="ah"><br>

					<label for="thp">Типоразмер</label>
					<select name="thp">
						<option value="1">A</option>
						<option value="2">B</option>
						<option value="3">C</option>
						<option value="4">L2</option>
						<option value="5">L3</option>
						<option value="6">L5</option>
						<option value="7">K</option>
					</select><br>

					<label for="x">Длина</label>
					<input type="number" id="x" name="x"><br>

					<label for="y">Ширина</label>
					<input type="number" id="y" name="y"><br>

					<label for="z">Высота</label>
					<input type="number" id="z" name="z"><br>

					<label for="bolt">Тип соединения</label>
					<select name="bolt">
						<option value="0">Конус</option>
						<option value="1">Болт</option>
					</select><br>

					<label for="pol">Полярность</label>
					<select name="pol">
						<option value="0">Обратная</option>
						<option value="1">Прямая</option>
					</select><br>

					<label for="distprice">Цена производителя</label>
					<input type="number" id="distprice" name="distprice"><br>

					<label for="optprice">Оптовая цена</label>
					<input type="number" id="optprice" name="optprice"><br>

					<label for="price">Цена</label>
					<input type="number" id="price" name="price"><br>

					<label for="simprice">Завышенная цена</label>
					<input type="number" id="simprice" name="simprice"><br>

					<label for="photo">Имя файла изображения:</label>
					<input type="text" id="photo" name="photo"><br>
					<input type="hidden" name="upd" value="0">
			';
		}
?>
	<input type="submit" name="">
</form>
</section>
<?php
	include_once "footer.php";
?>