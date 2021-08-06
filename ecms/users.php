<?php
		$title="Пользователи";
		include_once "header.php";
?>
	<h1>Пользователи</h1>
	<a href="newus.php">Добавить</a>
	<table>
		<thead>
			<tr>
				<td>Код партнера</td>
				<td>Имя</td>
				<td>Почта</td>
				<td>Подтвержден</td>
				<td>Дата регистрации</td>
				<td>Роль</td>
				<td>Уровень</td>
				<td>Город</td>
				<td>Адрес</td>
				<td>Телефон</td>
				<td>Изменение</td>
				<td>Удаление</td>
			</tr>
		</thead>
		<tbody>
	<?php
			$result = $mysqli->query("SELECT id,name,mail,mailaccept,regdate,role,opt,town,address,phone FROM users");
			while ($row = $result->fetch_assoc())
			{
				$role="";
				$opt = "";
				switch ($row["role"]) 
				{
					case '2':
						$role = "Пользователь";
						break;
					case '3':
						$role = "Модератор";
						break;
					case '4':
						$role = "Администратор";
						break;
					default:
						$role = "Гость";
						break;
				}
				switch ($row["opt"]) 
				{
					case '0':
						$opt = "Обычный";
						break;
					case '1':
						$opt = "Оптовый 1";
						break;
					case '2':
						$opt = "Оптовый 2";
						break;
					default:
						$opt = "Ошибка";
						break;
				}
				echo 	"<tr>
						<td>".$row["id"]."</td>
						<td>".$row["name"]."</td>
						<td><a href=\"mailto:".$row["mail"]."\">".$row["mail"]."</a></td>
						<td>".($row["mailaccept"] != "" ? "Нет" : "Да")."</td>
						<td>".$row["regdate"]."</td>
						<td>".$role."</td>
						<td>".$opt."</td>
						<td>".$row["town"]."</td>
						<td>".$row["address"]."</td>
						<td><a href=\"tel:".$row["phone"]."\">".$row["phone"]."</a></td>
						<td><a href=\"newus.php?id=".$row["id"]."\">Изменить</a></td><td><a href=\"delus.php?id=".$row["id"]."\">Удалить</a></td></tr>";
			}
	?>
		</tbody>
	</table>
	<a href="newus.php">Добавить</a>
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