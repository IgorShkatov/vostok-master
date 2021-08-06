<?php
		$title="Корзина";
		$nav = 0;
		include_once "header.php";
?>
<section>

	<?php

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
			echo $code;
		if($_SESSION["role"] > 1)
		{
			echo '<input id="dost" type="checkbox"> <label for="dost">Доставка</label><p>Стоимость доставки в ваш город рассчитывается отдельно</p>';

			echo "<a href=\"#\"><button class=\"cartbuy\" onclick=\"createzakaz()\">Заказать</button></a>";
		}
		else
		{
			echo '<p>Для продолжения заказа <span onclick="translogin()" style="color: red; cursor: pointer;">Войдите</span></p>';
		}
	}
	else
	{
		echo "<p>В корзине в данный момент нет товаров!</p><a href=\"/\">Вернуться к каталогу</a>";
	}
?>
</section>
<script type="text/javascript">
	var dost = document.getElementById("dost");

	function createzakaz()
	{
		var checked = dost.checked;
		window.open("buycart.php?dost=" + (dost.checked ? "1" : 0),"_self")
	}
</script>
<?php
		include_once "footer.php";
?>