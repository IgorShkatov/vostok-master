<?php
include_once "db.php";
if($_GET)
{
	if(isset($_GET["mail"]))
	{
		$code = generateCode();
		$result = $mysqli->query("UPDATE users SET passaccept='".$code."' WHERE mail = '".$_GET["mail"]."'");

		$headers = "From: ceo@tdtsv.ru\r\n";
		$headers .= "Reply-To: ceo@tdtsv.ru\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		mail($_GET["mail"], "Запрос на восстановление пароля", "Вы отправили запрос на восстановление пароля. Если это были не вы, проигнорируйте это сообщение!<br>Для восстановления перейдите по ссылке: <a href=\"http://tdtsv.ru/?forcode=".$code."\">http://tdtsv.ru/?forcode=".$code."</a>",$headers);
	}
}

function generateCode($length = 32)
{
   $chars = 'abdefhiknrstyz1234567890';
   $numChars = strlen($chars);
   $string = '';
   for ($i = 0; $i < $length; $i++)
   {
      $string .= substr($chars, rand(1, $numChars) - 1, 1);
   }
   return $string;
}
?>