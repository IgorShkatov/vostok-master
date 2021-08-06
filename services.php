<?php
		$title="Сервисы";
		$nav = 5;
		include_once "header.php";
?>
<section class="services">
	<h1>Наши услуги</h1>
	<table>
		<tbody>
	<?php
			$result = $mysqli->query("SELECT name FROM services");
			while ($row = $result->fetch_assoc())
			{
				echo 	"<tr><td>".$row["name"]."</td></tr>";
			}
	?>
		</tbody>
	</table>

			<div class="vert">
				<p class="question">Есть вопрос? Напишите нам!</p>
				<button onclick="openquest()">Задать вопрос</button>
			</div>
</section>
<?php
		include_once "footer.php";
?>