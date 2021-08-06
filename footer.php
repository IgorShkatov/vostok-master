	<footer>
		<div class="wrapper">
		<div class="vert centertext">
			<a href="/"><div class="logo"></div></a>
			<a href="/"><p>Главная</p></a>
			<a href="/about.php"><p>О компании</p></a>
			<a href="/serts.php"><p>Сертификаты</p></a>
			<a href="/news.php"><p>Новости</p></a>
			<a href="/services.php"><p>Услуги</p></a>
			<a href="/reviews.php"><p>Отзывы</p></a>
			<a href="/contacts.php"><p>Контакты</p></a>
			<!--<a href="/sitemap.php"><p>Карта сайта</p></a>-->
		</div>
			<div class="hor fwrap jcsa cblocks">
				<div class="hor cblockb falc">
					<div class="back phone"></div>
					<a href="tel:+79063328709" class="texttbold">+7(906) 332 87 09</a>
				</div>
				<div class="hor cblocksm falc">
				<div class="back mailwh"></div>
				<a href="mailto:sales4@tdtsv.ru">sales4@tdtsv.ru</a>
			</div>
				<div class="hor cblockb fals">
				<div class="back geowh"></div>
					<div class="vert">
								<p>РТ, Набережные Челны,</p>
								<p>ул. Техническая, 20</p>
								<p><br>г. Москва, метро Южная</p>
								<p>ул. Днепропетровская 2</p>
								<p>БЦ Глобал Сити</p>
								<p>5 эт. оф.518</p>
					</div>
				</div>
				<div class="hor cblocksm fals">
				<div class="back timewh"></div>
					<div class="vert">
					<p>пн.-пт. 9:00-16:00;</p>
					<p>сб.-вс. выходной</p>
					</div>
				</div>
			</div>
		<div class="vert">
			<p class="question upper">у вас есть вопрос?<br>напишите нам!</p>
			<form>
			<div class="vert">
				<input type="text" name="" id="footmail" placeholder="Введите email">
				<input type="text" name="" id="footphone" placeholder="Введите телефон">
				<textarea id="foottext" placeholder="Введите сообщение"></textarea>
				<input type="button" onclick="sendfootquestion()" name="" value="Отправить">
			</div>
			</form>
		</div>
	</div>
	</footer>
</main>
<dialog id="loginform">
	<form method="POST">
		<div class="close back" onclick="closelogin()"></div>
		<h2>Вход</h2>
		<label>Email:</label>
		<input type="text" id="loginmail" name="mail" placeholder="Введите email">
		<label>Пароль:</label>
		<input type="password" id="loginpass" name="pass" placeholder="Введите пароль">
		<input type="button" onclick="setlogin()" name="" value="Войти">
		<p>Еще нет аккаунта? <span onclick="transreg()">Зарегистрируйтесь!</span></p>
		<p><span onclick="transforgot()">Забыли пароль?</span></p>
	</form>
</dialog>
<dialog id="regform">
	<form method="POST">
		<div class="close back" onclick="closereg()"></div>
		<h2>Регистрация</h2>
		<label>Email:</label>
		<input type="text" id="regemail" name="" placeholder="Введите email">
		<label>Имя:</label>
		<input type="text" id="regname" name="" placeholder="Введите имя">
		<label>Телефон:</label>
		<input type="tel" id="regphone" name="" placeholder="Введите телефон">
		<label>Пароль:</label>
		<input type="password" id="regpass" name="" placeholder="Введите пароль">
		<label>Повторите пароль:</label>
		<input type="password" id="regaccpass" name="" placeholder="Повторите пароль">
		<input type="button" onclick="setreg()" name="" value="Зарегистрироваться">
		<p>Уже зарегистрированы? <span onclick="translogin()">Войдите!</span></p>
	</form>
</dialog>
<dialog id="questform">
	<form method="POST">
		<div class="close back" onclick="closequest()"></div>
		<h2>Задать вопрос</h2>
		<label>Email:</label>
		<input type="text" id="modalmail" name="" placeholder="Введите почту">		
		<label>Телефон:</label>
		<input type="text" id="modalphone" name="" placeholder="Введите телефон">
		<label>Текст:</label>
		<textarea id="modaltext" placeholder="Введите сообщение"></textarea>
		<input type="button" onclick="sendmodalquestion()" name="" value="Отправить">
	</form>
</dialog>
<dialog id="forgotform">
	<form method="POST">
		<div class="close back" onclick="closeforgot()"></div>
		<h2>Забыли пароль</h2>
		<label>Email:</label>
		<input type="email" id="forgotmail" name="" placeholder="Введите почту">	
		<input type="button" onclick="sendforgot()" name="" value="Отправить">
		<p>Вспомнили пароль? <span onclick="translogin()">Войдите!</span></p>
	</form>
</dialog>
<dialog id="acceptform">
	<form>
		<h2 id="acceptmessage"></h2>
		<input onclick="closeaccept()" type="button" name="" value="Хорошо">
	</form>
</dialog>
<script type="text/javascript">
	var loginform = document.getElementById("loginform");
	var mobilemenu = document.getElementById("mobilemenu");
	var regform = document.getElementById("regform");
	var prodcount = document.getElementById("prodcount");
	var questform = document.getElementById("questform");
	var acceptform = document.getElementById("acceptform");
	var forgotform = document.getElementById("forgotform");

	function openaccept(text)
	{
		var acceptmessage = document.getElementById("acceptmessage");
		acceptmessage.innerHTML = text;

		acceptform.setAttribute("open","");
	}

	function closeaccept()
	{
		acceptform.removeAttribute("open");
	}

	function openforgot()
	{
		forgotform.setAttribute("open","");
	}

	function closeforgot()
	{
		forgotform.removeAttribute("open");
	}

	function openlogin()
	{
		loginform.setAttribute("open","");
	}

	function closelogin()
	{
		loginform.removeAttribute("open");
	}

	function openquest()
	{
		questform.setAttribute("open","");
	}

	function closequest()
	{
		questform.removeAttribute("open");
	}

	function closereg()
	{
		regform.removeAttribute("open");
	}

	function mm()
	{
		if(mobilemenu.style.display == "flex")
		{
			mobilemenu.style.display = "none";
		}
		else
		{
			mobilemenu.style.display = "flex";
		}
	}

	function transreg()
	{
		loginform.removeAttribute("open");
		regform.setAttribute("open","");
	}

	function transforgot()
	{
		loginform.removeAttribute("open");
		forgotform.setAttribute("open","");
	}

	function translogin()
	{
		forgotform.removeAttribute("open");
		regform.removeAttribute("open");
		loginform.setAttribute("open","");
	}

	function addtocart(id)
	{
		var xhr = new XMLHttpRequest();
		var tempcart = document.getElementById("cart"+id);
		var tempbuy = document.getElementById("buy"+id);
		var params = 'id=' + id;
		xhr.onreadystatechange=function()
		{
			if (xhr.readyState == XMLHttpRequest.DONE)
			{
				prodcount.innerHTML = xhr.responseText;
				tempbuy.style.display = "none";
				tempcart.style.display = "flex";
				openaccept("Товар успешно добавлен в корзину!");
			}
		}

		xhr.open("GET", '/addtocart.php?' + params, true);

		xhr.send();
	}

	function pluscart(id)
	{
		var xhr = new XMLHttpRequest();
		var tempcount = document.getElementById("count"+id);
		var params = 'id=' + id;
		xhr.onreadystatechange=function()
		{
			if (xhr.readyState == XMLHttpRequest.DONE){
			var lines = xhr.responseText.split('$$');
			prodcount.innerHTML = lines[0];
			tempcount.innerHTML = lines[1];
		}
		}

		xhr.open("GET", '/pluscart.php?' + params, true);
		xhr.send();
	}

	function minuscart(id)
	{
		var xhr = new XMLHttpRequest();
		var tempcount = document.getElementById("count"+id);
		var params = 'id=' + id;
		xhr.onreadystatechange=function()
		{
			if (xhr.readyState == XMLHttpRequest.DONE)
			{
			var lines = xhr.responseText.split('$$');
			prodcount.innerHTML = lines[0];
			tempcount.innerHTML = lines[1];
			if(lines[1] == 0)
			{
				var tempcart = document.getElementById("cart"+id);
				var tempbuy = document.getElementById("buy"+id);
				tempbuy.style.display = "flex";
				tempcart.style.display = "none";
			}
			}
		}

		xhr.open("GET", '/minuscart.php?' + params, true);
		xhr.send();
	}

	function sendforgot()
	{
		var forgotmail = document.getElementById("forgotmail");

		if(forgotmail.value == "")
		{
			alert("Не все поля заполнены!");
		}
		else
		{
			var params = 'mail=' + forgotmail.value;
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange=function()
			{
				if (xhr.readyState == XMLHttpRequest.DONE)
				{
					closeforgot();
					forgotmail.value = "";
					openaccept("Ссылка на восстановление отправлена на вашу почту!");
				}
			}

			xhr.open("GET", '/forgotpass.php?' + params, true);
			xhr.send();
		}
	}

	function sendmodalquestion()
	{
		var modalmail = document.getElementById("modalmail");
		var modalphone = document.getElementById("modalphone");
		var modaltext = document.getElementById("modaltext");

		if(modalmail.value == "" || modalphone.value == "" || modaltext.value=="")
		{
			alert("Не все поля заполнены!");
		}
		else
		{
			var params = 'mail=' + modalmail.value + '&phone=' + modalphone.value + '&text=' + modaltext.value;
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange=function()
			{
				if (xhr.readyState == XMLHttpRequest.DONE)
				{
					closequest();
					modalmail.value = "";
					modalphone.value = "";
					modaltext.value = "";
					openaccept("Ваше сообщение успешно отправлено!");
				}
			}

			xhr.open("GET", '/sendquestion.php?' + params, true);
			xhr.send();
		}
	}

	function sendfootquestion()
	{

		var footmail = document.getElementById("footmail");
		var footphone = document.getElementById("footphone");
		var foottext = document.getElementById("foottext");

		if(footmail.value == "" || footphone.value == "" || foottext.value=="")
		{
			alert("Не все поля заполнены!");
		}
		else
		{
			var params = 'mail=' + footmail.value + '&phone=' + footphone.value + '&text=' + foottext.value;
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange=function()
			{
				if (xhr.readyState == XMLHttpRequest.DONE)
				{
					footmail.value = "";
					footphone.value = "";
					foottext.value = "";
					openaccept("Ваше сообщение успешно отправлено!");
				}
			}

			xhr.open("GET", '/sendquestion.php?' + params, true);
			xhr.send();
		}
	}

	function setreg()
	{
		var regemail = document.getElementById("regemail");
		var regname = document.getElementById("regname");
		var regphone = document.getElementById("regphone");
		var regpass = document.getElementById("regpass");
		var regaccpass = document.getElementById("regaccpass");

		if(regemail.value == "" || regname.value == "" || regphone.value== "" || regpass.value== "" || regaccpass.value== "")
		{
			alert("Не все поля заполнены!");
		}
		else
		{
			if(regpass.value == regaccpass.value)
			{
				var fd = new FormData();
				fd.append("mail",regemail.value);
				fd.append("phone",regphone.value);
				fd.append("name",regname.value);
				fd.append("pass",regpass.value);

				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange=function()
				{
					if (xhr.readyState == XMLHttpRequest.DONE)
					{
						closereg();
						regemail.value = "";
						regname.value = "";
						regphone.value = "";
						regpass.value = "";
						regaccpass.value = "";
						openaccept("Вы успешно зарегистрированы!<br>Пожалуйста, подтвердите почту");
					}
				}

				xhr.open("POST", '/reg.php', true);
				xhr.send(fd);
			}
			else
			{
				alert("Пароли не совпадают!");
			}
		}
	}

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
						closelogin();
						loginmail.value = "";
						loginpass.value = "";
						window.location = window.location.pathname;
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
if(isset($_GET["accmail"]))
{
	echo "<script type=\"text/javascript\">
		openaccept(\"Вы успешно подтвердили свою почту!\");
	</script>";
}
if(isset($_GET["cart"]))
{
	echo "<script type=\"text/javascript\">
		openaccept(\"Ваш заказ успешно создан!\");
	</script>";
}
if(isset($_GET["accpass"]))
{
	echo "<script type=\"text/javascript\">
		openaccept(\"Ваш пароль успешно изменен!\");
	</script>";
}
if(isset($_GET["errpass"]))
{
	echo "<script type=\"text/javascript\">
		openaccept(\"".$_GET["errpass"]."\");
	</script>";
}
if(isset($_GET["forcode"]))
{
	echo '<dialog id="respassform" open>
	<form method="POST" action="respass.php">
		<h2>Восстановление пароля</h2>
		<label>Пароль:</label>
		<input type="password" id="respass" name="respass" placeholder="Введите пароль">
		<input type="hidden" id="rescode" name="rescode" value="'.$_GET["forcode"].'">
		<label>Повторите пароль:</label>
		<input type="password" id="represpass" name="represpass" placeholder="Повторите пароль">	
		<input type="submit" name="" value="Отправить">
	</form>
</dialog>';
}
?>
</body>
</html>