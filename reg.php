<?php
include_once "db.php";
if($_POST)
{
	if(count($_POST) > 3)
	{
		$code = generateCode();
		$password = password_hash($_POST["pass"],PASSWORD_DEFAULT);
		$result = $mysqli->query("INSERT INTO users (name,mail,password,mailaccept,role,phone) VALUES('".$_POST["name"]."','".$_POST["mail"]."','".$password."','".$code."','2','".$_POST["phone"]."')");

		$headers = "From: ceo@tdtsv.ru\r\n";
		$headers .= "Reply-To: ceo@tdtsv.ru\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		mail($_POST["mail"], "Запрос", "Поздравляем, ".$_POST["name"].", вы успешно зарегистрированы!<br><br>Для завершения регистрации перейдите по ссылке: <a href=\"http://tdtsv.ru/accmail.php?code=".$code."\">http://new.tdtsv.ru/accmail.php?code=".$code."</a>",$headers);
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