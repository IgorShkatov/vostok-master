<?php
 	include_once "db.php";
 	session_start();
 	if(!isset($_SESSION["role"]))
 	{
 		$_SESSION["role"]=1;
 		$_SESSION["name"]="Гость";
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
	<header>
		<div class="mobwrapper">
			<div class="menuback menu" style="background-size: 40px;" onclick="mm()">
				<nav id="mobilemenu">
					<?php echo  ($_SESSION["role"] < 2) ? '<a href="#" onclick="openlogin()"><p>войти</p></a>' : '<a href="/lc.php"><p>личный кабинет</p></a>'; ?>
					<a href="/"><p>главная</p></a>
					<a href="/about.php"><p>о компании</p></a>
					<a href="/serts.php"><p>сертификаты</p></a>
					<a href="/news.php"><p>новости</p></a>
					<a href="/services.php"><p>услуги</p></a>
					<a href="/reviews.php"><p>отзывы</p></a>
					<a href="/contacts.php"><p>контакты</p></a>
					<a href="#" onclick="openquest()"><p>задать вопрос</p></a>
				</nav>
			</div>
			<a href="/" style="background-color: #fff;"><div class="menuback logo"></div></a>
			<a href="cart.php"><div class="menuback cartw" style="background-size: 40px;"></div></a>
		</div>
		<div class="wrapper">
			<div class="vert">
				<a href="/"><div class="logo"></div></a>
				<p class="slogan">Крупнооптовая, мелкооптовая, розничная продажа стартерных аккумуляторных батарей</p>
			</div>
			<div class="hor fwrap jcsa cblocks">
				<div class="hor cblockb falc">
					<div class="back phone"></div>
					<a href="tel:+79063328709" class="texttbold">+7(906) 332 87 09</a>
				</div>
				<div class="hor cblocksm falc">
				<div class="back mailbl"></div>
				<a href="mailto:sales4@tdtsv.ru">sales4@tdtsv.ru</a>
			</div>
				<div class="hor cblockb fals">
				<div class="back geobl"></div>
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
				<div class="back timebl"></div>
					<div class="vert">
					<p>пн.-пт. 9:00-16:00;</p>
					<p>сб.-вс. выходной</p>
					</div>
				</div>
			</div>
			<div class="vert">
				<p class="question">Есть вопрос? Напишите нам!</p>
				<button onclick="openquest()">Задать вопрос</button>
			</div>
			<div class="vert">

				<?php if ($_SESSION["role"] < 2): ?>
				<div class="vert" id="login" onclick="openlogin()">
					<div class="backhead login"></div>
					<figure style="text-align: center;">Войти</figure>
				</div>
				<?php else: ?>
				<div class="vert">
					<a href="lc.php">
						<div class="backhead userim"></div>
						<figure style="text-align: center;"><?php echo $_SESSION["name"]; ?></figure>
					</a>	
				</div>
				<?php endif; ?>
				<div class="vert">
					<output class="texttbold" id="prodcount"><?php if(isset($_SESSION["prods"])){ echo count($_SESSION["prods"]);}else{echo '0';} ?></output>
						<a href="cart.php">
							<div class="backhead cart">
								
							</div>
							<figure>Корзина</figure>
						</a>	
				</div>
			</div>
		</div>
		<nav class="desktop">
			<a href="/"><p <?php if($nav == 1){echo 'class="select"';} ?>>главная</p></a>
			<a href="/about.php"><p <?php if($nav == 2){echo 'class="select"';} ?>>о компании</p></a>
			<a href="/serts.php"><p <?php if($nav == 3){echo 'class="select"';} ?>>сертификаты</p></a>
			<a href="/news.php"><p <?php if($nav == 4){echo 'class="select"';} ?>>новости</p></a>
			<a href="/services.php"><p <?php if($nav == 5){echo 'class="select"';} ?>>услуги</p></a>
			<a href="/reviews.php"><p <?php if($nav == 6){echo 'class="select"';} ?>>отзывы</p></a>
			<a href="/contacts.php"><p <?php if($nav == 7){echo 'class="select"';} ?>>контакты</p></a>
		</nav>
	</header>