<?php
if($_GET)
{
	$headers = "From: ".$_GET["mail"]."\r\n";
	$headers .= "Reply-To: ".$_GET["mail"]."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		mail("sales4@tdtsv.ru", "Форма вопроса", "Телефон:".$_GET["phone"]."<br>".$_GET["text"],$headers);

	$headers = "From: sales4@tdtsv.ru\r\n";
	$headers .= "Reply-To: sales4@tdtsv.ru\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		mail($_GET["mail"], "Форма вопроса", "Ваш вопрос успешно передан, в ближайшее время мы с вами свяжемся!",$headers);
}
?>