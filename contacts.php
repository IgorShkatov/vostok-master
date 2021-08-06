<?php
		$title="Контакты";
		$nav = 7;
		include_once "header.php";
?>
<section>
	<h1 style="text-align: center;">Контакты</h1>
	<table class="contacts">
		<thead>
			<tr>
				<td>Должность</td>
				<td>ФИО</td>
				<td>Телефон</td>
				<td>E-mail</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Генеральный директор</td>
				<td>Юрий Андрианов</td>
				<td><a href="tel:+79038350333">+79038350333</a></td>
				<td><a href="mailto:ceo@tdtsv.ru">ceo@tdtsv.ru</a></td>
			</tr>
			<tr>
				<td>Исполнительный директор</td>
				<td>Сергей Гурылев</td>
				<td><a href="tel:+79093083566">+79093083566</a></td>
				<td><a href="mailto:sales8@tdtsv.ru">sales8@tdtsv.ru</a></td>
			</tr>
			<tr>
				<td>Руководитель отдела продаж</td>
				<td>Иванов Алексей</td>
				<td><a href="tel:+79063328709">+79063328709</a></td>
				<td><a href="mailto:sales4@tdtsv.ru">sales4@tdtsv.ru</a></td>
			</tr>
			<tr>
				<td>Начальник отдела поддержки продаж</td>
				<td>Закирова Зухра</td>
				<td><a href="tel:+79063317240">+79063317240</a></td>
				<td><a href="mailto:sales1@tdtsv.ru">sales1@tdtsv.ru</a></td>
			</tr>
			<tr>
				<td colspan="2">Торговый представитель г.Казань</td>
				<td><a href="tel:+79625786056">+79625786056</a></td>
				<td><a href="mailto:sales7@tdtsv.ru">sales7@tdtsv.ru</a></td>
			</tr>
			<tr>
				<td colspan="2">Торговый представитель г.Рязань</td>
				<td><a href="tel:+79036418787">+79036418787</a></td>
				<td><a href="mailto:sales3@tdtsv.ru">sales3@tdtsv.ru</a></td>
			</tr>
	</tbody>
	</table>
</section>
<?php
		include_once "footer.php";
?>