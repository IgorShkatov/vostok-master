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
	<h1>Пользователь</h1>
	<form action="manus.php">
	<?php
		if(isset($_GET["id"]))
		{
			$result = $mysqli->query("SELECT id,name,mail,mailaccept,regdate,role,opt,town,address,phone FROM users WHERE id=".$new);
			while ($row = $result->fetch_assoc())
			{
				echo '
					<label>Код партнера: '.$row["id"].'</label><br>
					<label for="name">Имя:</label>
					<input type="text" id="name" value="'.$row["name"].'" name="name"><br>
					<label for="name">Электронная почта</label>
					<input type="text" id="name" value="'.$row["mail"].'" name="mail"><br>
					<label>Дата регистрации: '.$row["regdate"].'</label><br>
					<label for="role">Роль:</label>
					<select name="role">
						<option value="2" '.($row["role"] == 2 ? 'selected' : '').'>Пользователь</option>
						<option value="3" '.($row["role"] == 3 ? 'selected' : '').'>Модератор</option>
						<option value="4" '.($row["role"] == 4 ? 'selected' : '').'>Администратор</option>
					</select><br>
					<label for="opt">Уровень:</label>
					<select name="opt">
						<option value="0" '.($row["opt"] == 0 ? 'selected' : '').'>Обычный</option>
						<option value="1" '.($row["opt"] == 1 ? 'selected' : '').'>Оптовый 1</option>
						<option value="2" '.($row["opt"] == 2 ? 'selected' : '').'>Оптовый 2</option>
					</select><br>
					<label for="town">Город:</label>
					<input type="text" id="town" value="'.$row["town"].'" name="town"><br>
					<label for="address">Адрес:</label>
					<input type="text" id="address" value="'.$row["address"].'" name="address"><br>
					<label for="phone">Телефон:</label>
					<input type="text" id="phone" value="'.$row["phone"].'" name="phone"><br>
					<input type="hidden" name="upd" value="1">
					<input type="hidden" name="id" value="'.$_GET["id"].'">
				';
			}
		}
		else
		{
			echo '
					<label for="name">Имя:</label>
					<input type="text" id="name" name="name"><br>
					<label for="name">Электронная почта</label>
					<input type="text" id="name" name="mail"><br>
					<label for="role">Роль:</label>
					<select name="role">
						<option value="2">Пользователь</option>
						<option value="3">Модератор</option>
						<option value="4">Администратор</option>
					</select><br>
					<label for="opt">Уровень:</label>
					<select name="opt">
						<option value="0">Обычный</option>
						<option value="1">Оптовый 1</option>
						<option value="2">Оптовый 2</option>
					</select><br>
					<label for="town">Город:</label>
					<input type="text" id="town" name="town"><br>
					<label for="address">Адрес:</label>
					<input type="text" id="address" name="address"><br>
					<label for="phone">Телефон:</label>
					<input type="text" id="phone" name="phone"><br>
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