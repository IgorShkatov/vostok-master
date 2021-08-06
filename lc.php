<?php
		$title="Личный кабинет";
		$nav = 0;
		include_once "header.php";
		if ($_SESSION["role"] < 2)
		{
			header("Location: /");
		}
?>
<section class="lic">
	<figure class="lhead">
		<h2><?php echo $_SESSION["name"]; ?></h2>
		<button onclick="openlctab3()">Редактировать аккаунт</button>
	</figure>
	<figure class="lnav">
		<button class="select" id="lcb1" onclick="openlctab1()">Профиль</button>
		<button id="lcb2" onclick="openlctab2()">Мои заказы</button>
	</figure>
	<figure class="tab1" id="lctab1">
		<table>
			<tr>
				<td>Код партнера:</td>
				<td><?php echo $_SESSION["part"]; ?></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><?php echo $_SESSION["mail"]; ?></td>
			</tr>
			<tr>
				<td>Телефон:</td>
				<td><?php echo $_SESSION["phone"]; ?></td>
			</tr>
			<tr>
				<td>Город:</td>
				<td><?php echo $_SESSION["town"]; ?></td>
			</tr>
			<tr>
				<td>Адрес:</td>
				<td><?php echo $_SESSION["address"]; ?></td>
			</tr>
			<tr>
				<td>Дата регистрации:</td>
				<td><?php echo $_SESSION["regdate"]; ?></td>
			</tr>
		</table>
	</figure>
	<figure class="tab2" id="lctab2">
		<?php 
			$result = $mysqli->query("SELECT zakaz,zakazdate FROM zakaz WHERE userid = '".$_SESSION["part"]."'");
			if(mysqli_num_rows($result) > 0)
			{
				echo "<table>
			<thead>
				<tr>
					<td>Дата заказа</td>
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
								echo ($counter == 0) ?  "<td rowspan=\"$count\">".$row["zakazdate"]."</td>" :  ""; 
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
			else
			{
				echo "<h3>У вас нет заказов!</h3>";
			}
			
		?>
		<!--<table>
			<thead>
				<tr>
					<td>Дата заказа</td>
					<td>Товар</td>
					<td>Количество</td>
					<td>Цена</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td rowspan="3">Код партнера:</td>
					<td>1</td>
					<td>1</td>
					<td>1</td>
				</tr>
				<tr>
					<td>1</td>
					<td>1</td>
					<td>1</td>
				</tr>
				<tr>
					<td colspan="2">1</td>
					<td>1</td>
				</tr>
			</tbody>
		</table>-->
	</figure>
	<figure class="tab3" id="lctab3">
		<form>
		<table>
			<tr>
				<td>Имя:</td>
				<td><input type="text" name="name" id="lcchname" value="<?php echo $_SESSION["name"]; ?>"></td>
			</tr>
			<tr>
				<td>Телефон:</td>
				<td><input type="tel" name="phone" id="lcchphone" value="<?php echo $_SESSION["phone"]; ?>"></td>
			</tr>
			<tr>
				<td>Город:</td>
				<td><input type="text" name="town" id="lcchtown" value="<?php echo $_SESSION["town"]; ?>"></td>
			</tr>
			<tr>
				<td>Адрес:</td>
				<td><input type="text" name="address" id="lcchaddress" value="<?php echo $_SESSION["address"]; ?>"></td>
			</tr>
			<tr>
				<td colspan="2" class="centertext"><input type="button" name="" onclick="upuser()" value="Сохранить"></td>
			</tr>
		</table>
		</form>
	</figure>
	<section>
		<button class="lcexit" onclick="logout()">Выйти</button>
	</section>

</section>
<script type="text/javascript">
	var lctab3 = document.getElementById("lctab3");
	var lctab2 = document.getElementById("lctab2");
	var lctab1 = document.getElementById("lctab1");

	var lcb1 = document.getElementById("lcb1");
	var lcb2 = document.getElementById("lcb2");

	function openlctab1()
	{
		lctab1.style.display = "block";
		lctab2.style.display = "none";
		lctab3.style.display = "none";

		lcb1.classList.add("select");
		lcb2.classList.remove("select");
	}

	function openlctab2()
	{
		lctab2.style.display = "block";
		lctab1.style.display = "none";
		lctab3.style.display = "none";

		lcb2.classList.add("select");
		lcb1.classList.remove("select");
	}

	function openlctab3()
	{
		lctab3.style.display = "block";
		lctab1.style.display = "none";
		lctab2.style.display = "none";

		lcb2.classList.remove("select");
		lcb1.classList.remove("select");
	}

	function logout()
	{

			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange=function()
			{
				if (xhr.readyState == XMLHttpRequest.DONE)
				{
					location.reload();
				}
			}
			xhr.open("GET", '/logout.php', true);
			xhr.send();
	}

	function upuser()
	{
		var lcchname = document.getElementById("lcchname");
		var lcchphone = document.getElementById("lcchphone");
		var lcchtown = document.getElementById("lcchtown");
		var lcchaddress = document.getElementById("lcchaddress");

		if(lcchname.value == "" || lcchphone.value == "")
		{
			alert("Не все важные поля заполнены!");
		}
		else
		{
			var fd = new FormData();
			fd.append("name",lcchname.value);
			fd.append("phone",lcchphone.value);
			fd.append("town",lcchtown.value);
			fd.append("address",lcchaddress.value);

			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange=function()
			{
				if (xhr.readyState == XMLHttpRequest.DONE)
				{
					lcchname.value = "";
					lcchphone.value = "";
					lcchtown.value = "";
					lcchaddress.value = "";
					location.reload();
				}
			}
			xhr.open("POST", '/updateuser.php', true);
			xhr.send(fd);
		}
	}
</script>
<?php
		include_once "footer.php";
?>