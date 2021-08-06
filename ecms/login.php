<?php
	$title ="Вход в систему";
	session_start();
 	if(!isset($_SESSION["role"]))
 	{
 		$_SESSION["role"]=1;
 		$_SESSION["name"]="Гость";
 	}
 	if ($_SESSION["role"] < 3)
 	{
 		echo "Недостаточно прав доступа. Войдите под аккаунтом администратора!";
 	}
 	else
 	{
 		header("Location: index.php");
 	}

	if(isset($_POST["mail"]))
	{
		$result = $mysqli->query("SELECT id,name,mail,password,regdate,role,town,address,phone FROM users WHERE mail='".$_POST["mail"]."'");
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = $result->fetch_assoc())
			{
				if(password_verify($_POST["pass"],$row["password"]))
				{
					$_SESSION["part"] = $row["id"];
					$_SESSION["name"] = $row["name"];
					$_SESSION["role"] = $row["role"];
					$_SESSION["regdate"] = $row["regdate"];
					$_SESSION["mail"] = $row["mail"];
					$_SESSION["town"] = $row["town"];
					$_SESSION["address"] = $row["address"];
					$_SESSION["phone"] = $row["phone"];
					echo "0";
				}
				else
				{
					echo "1";
				}
			}
		}
		else
		{
			echo "2";
		}
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="keywords" content="ключевые слова" />
	<meta name="description" content="ключевые слова" />
</head>
<body>
<main>
	<section>
		<form>
		<h2>Вход</h2>
		<label>Email:</label>
		<input type="text" id="loginmail" name="mail" placeholder="Введите email">
		<label>Пароль:</label>
		<input type="password" id="loginpass" name="pass" placeholder="Введите пароль">
		<input type="button" onclick="setlogin()" name="" value="Войти">	
		</form>
	</section>
	<script type="text/javascript">
	function setlogin()
	{
		var loginmail = document.getElementById("loginmail");
		var loginpass = document.getElementById("loginpass");

		if(loginmail.value == "" || loginpass.value == "")
		{
			alert("Не все поля заполнены!");
		}
		else
		{
			var fd = new FormData();
			fd.append("mail",loginmail.value);
			fd.append("pass",loginpass.value);

			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange=function()
			{
				if (xhr.readyState == XMLHttpRequest.DONE)
				{
					if(xhr.responseText == 0)
					{
						loginmail.value = "";
						loginpass.value = "";
						location.reload();
					}
					else if(xhr.responseText == 1)
					{
						openaccept("Пароль неверный!");
					}
					else
					{
						openaccept("Данного логина не найдено!");						
					}
				}
			}
			xhr.open("POST", '/login.php', true);
			xhr.send(fd);
		}
	}
	</script>
<?php
		include_once "footer.php";
?>