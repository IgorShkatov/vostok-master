<?php
		$title="Vostok TS";
		$nav = 1;
		include_once "header.php";
		ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
	<section class="banner-main">
		<!--Специальное предложение для оптовиков!
		От ведущего поставщика классических аккумуляторных батарей!
		Зарегистрируйтесь <sub>в личном кабинете</sub> и получите специальное предложение-->
	</section>
	<section class="search-main">
		<form>
			<div class="menuback resizer"></div>
			<input type="text" name="search" placeholder="Для поиска введите название товара или артикул">
			<input type="submit" value="поиск">
		</form>
	</section>
	<section class="catalog">
		<aside>
			<form class="sorter">
				<label for="idman">Марка</label>
				<select id="idman">
					<option value="0">Выберите...</option>
				<?php
					$result = $mysqli->query("SELECT id,name FROM manufacturers");
					while ($row = $result->fetch_assoc())
					{
						echo '<option value="'.$row["id"].'" '.(isset($_GET["idman"]) && $_GET["idman"] == $row["id"] ? 'selected' : '').'>'.$row["name"].'</option>';
					}
				?>
				</select>
				<label for="pol">Полярность</label>
				<select id="pol">
					<option value="0">Выбрать...</option>
					<option value="1" <?php echo (isset($_GET["pol"]) && $_GET["pol"] + 1 == 1 ? 'selected' : ''); ?>>Обратная</option>
					<option value="2" <?php echo (isset($_GET["pol"]) && $_GET["pol"] + 1 == 2 ? 'selected' : ''); ?>>Прямая</option>
				</select>
				<label>Емкость А/ч</label>
				<figure class="group">
					<label for="upah">От:</label>
					<input id="upah" type="number" min="0" max="5000" <?php echo (isset($_GET["upah"]) ? 'value="'.$_GET["upah"].'"' : '');?>>
					<label for="dnah">До:</label>
					<input id="dnah" type="number" min="0" max="5000" <?php echo (isset($_GET["dnah"]) ? 'value="'.$_GET["dnah"].'"' : '');?>>
				</figure>
				<label for="wmark">Расход воды</label>
				<select id="wmark">
					<option value="0">Выбрать...</option>
					<option value="1" <?php echo (isset($_GET["wmark"]) && $_GET["wmark"] + 1 == 1 ? 'selected' : '');?>>Обычный</option>
					<option value="2" <?php echo (isset($_GET["wmark"]) && $_GET["wmark"] + 1 == 2 ? 'selected' : '');?>>Низкий</option>
				</select>
				<label for="bolt">Тип клемм</label>
				<select id="bolt">
					<option value="0">Выбрать...</option>
					<option value="1" <?php echo (isset($_GET["bolt"]) && $_GET["bolt"] + 1 == 1 ? 'selected' : '');?>>Конус</option>
					<option value="2" <?php echo (isset($_GET["bolt"]) && $_GET["bolt"] + 1 == 2 ? 'selected' : '');?>>Болт</option>
				</select>
				<label>Размер по длине</label>
				<figure class="group">
					<label for="upx">От:</label>
					<input id="upx" type="number" min="0" max="1000" <?php echo (isset($_GET["upx"]) ? 'value="'.$_GET["upx"].'"' : '');?>>
					<label for="dnx">До:</label>
					<input id="dnx" type="number" min="0" max="1000" <?php echo (isset($_GET["dnx"]) ? 'value="'.$_GET["dnx"].'"' : '');?>>
				</figure>
				<label>Размер по ширине</label>
				<figure class="group">
					<label for="upy">От:</label>
					<input id="upy" type="number" min="0" max="1000" <?php echo (isset($_GET["upy"]) ? 'value="'.$_GET["upy"].'"' : '');?>>
					<label for="dny">До:</label>
					<input id="dny" type="number" min="0" max="1000" <?php echo (isset($_GET["dny"]) ? 'value="'.$_GET["dny"].'"' : '');?>>
				</figure>
				<label>Размер по высоте</label>
				<figure class="group">
					<label for="upz">От:</label>
					<input id="upz" type="number" min="0" max="1000" <?php echo (isset($_GET["upz"]) ? 'value="'.$_GET["upz"].'"' : '');?>>
					<label for="dnz">До:</label>
					<input id="dnz" type="number" min="0" max="1000" <?php echo (isset($_GET["dnz"]) ? 'value="'.$_GET["dnz"].'"' : '');?>>
				</figure>
				<label>ТПХ</label>
				<figure class="group">
					<label for="uptph">От:</label>
					<input id="uptph" type="number" min="0" max="2000" <?php echo (isset($_GET["uptph"]) ? 'value="'.$_GET["uptph"].'"' : '');?>>
					<label for="dntph">До:</label>
					<input id="dntph" type="number" min="0" max="2000" <?php echo (isset($_GET["dntph"]) ? 'value="'.$_GET["dntph"].'"' : '');?>>
				</figure>
				<label>Цена</label>
				<figure class="group">
					<label for="upprice">От:</label>
					<input id="upprice" type="number" min="0" max="25000" <?php echo (isset($_GET["upprice"]) ? 'value="'.$_GET["upprice"].'"' : '');?>>
					<label for="dnprice">До:</label>
					<input id="dnprice" type="number" min="0" max="25000" <?php echo (isset($_GET["dnprice"]) ? 'value="'.$_GET["dnprice"].'"' : '');?>>
				</figure>
				<figure class="buttons">
					<button type="button" onclick="startfilter()">Найти</button>
					<button type="button" onclick="resetfilter()">Сброс</button>
				</figure>
			</form>
		</aside>
		<div>
			<h2>Аккумуляторные батареи</h2>
			<div class="products">
			<?php
			$result="";
			$notSearchAndMan = false;
					if(isset($_GET["filter"]))
					{
						$resstring = "SELECT id,name,pol,price,simprice,photo FROM products";
						$filtered = 0;
						if(isset($_GET["idman"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND idman=".$_GET["idman"];
							}
							else
							{
								$resstring.=" WHERE idman=".$_GET["idman"];
							}
							$filtered++;
						}
						if(isset($_GET["pol"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND pol=".$_GET["pol"];
							}
							else
							{
								$resstring.=" WHERE pol=".$_GET["pol"];
							}
							$filtered++;
						}
						if(isset($_GET["wmark"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND wmark=".$_GET["wmark"];
							}
							else
							{
								$resstring.=" WHERE wmark=".$_GET["wmark"];
							}
							$filtered++;
						}
						if(isset($_GET["bolt"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND bolt=".$_GET["bolt"];
							}
							else
							{
								$resstring.=" WHERE bolt=".$_GET["bolt"];
							}
							$filtered++;
						}
						if(isset($_GET["upah"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND ah >=".$_GET["upah"];
							}
							else
							{
								$resstring.=" WHERE ah >=".$_GET["upah"];
							}
							$filtered++;
						}
						if(isset($_GET["dnah"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND ah <=".$_GET["dnah"];
							}
							else
							{
								$resstring.=" WHERE ah <=".$_GET["dnah"];
							}
							$filtered++;
						}
						if(isset($_GET["upx"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND x >=".$_GET["upx"];
							}
							else
							{
								$resstring.=" WHERE x >=".$_GET["upx"];
							}
							$filtered++;
						}
						if(isset($_GET["dnx"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND y <=".$_GET["dnx"];
							}
							else
							{
								$resstring.=" WHERE y <=".$_GET["dnx"];
							}
							$filtered++;
						}
						if(isset($_GET["upy"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND x >=".$_GET["upy"];
							}
							else
							{
								$resstring.=" WHERE x >=".$_GET["upy"];
							}
							$filtered++;
						}
						if(isset($_GET["dny"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND y <=".$_GET["dny"];
							}
							else
							{
								$resstring.=" WHERE y <=".$_GET["dny"];
							}
							$filtered++;
						}
						if(isset($_GET["upz"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND z >=".$_GET["upz"];
							}
							else
							{
								$resstring.=" WHERE z >=".$_GET["upz"];
							}
							$filtered++;
						}
						if(isset($_GET["dnz"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND z <=".$_GET["dnz"];
							}
							else
							{
								$resstring.=" WHERE z <=".$_GET["dnz"];
							}
							$filtered++;
						}
						if(isset($_GET["uptph"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND tph >=".$_GET["uptph"];
							}
							else
							{
								$resstring.=" WHERE tph >=".$_GET["uptph"];
							}
							$filtered++;
						}
						if(isset($_GET["dntph"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND tph <=".$_GET["dntph"];
							}
							else
							{
								$resstring.=" WHERE tph <=".$_GET["dntph"];
							}
							$filtered++;
						}
						if(isset($_GET["upprice"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND price >=".$_GET["upprice"];
							}
							else
							{
								$resstring.=" WHERE price >=".$_GET["upprice"];
							}
							$filtered++;
						}
						if(isset($_GET["dnprice"]))
						{
							if($filtered > 0)
							{
								$resstring.=" AND price <=".$_GET["dnprice"];
							}
							else
							{
								$resstring.=" WHERE price <=".$_GET["dnprice"];
							}
							$filtered++;
						}
						$result = $mysqli->query($resstring);
					}
					else
					{
						if(isset($_GET["search"]))
						{
							$result = $mysqli->query("SELECT id,name,pol,price,simprice,photo FROM products WHERE name LIKE '%".$_GET["search"]."%'");
						}
						else if(isset($_GET["idman"]))
						{
							if($_GET["idman"] > 0)
							{
								$result = $mysqli->query("SELECT id,name,pol,price,simprice,photo FROM products WHERE idman=".$_GET["idman"]);
							}
							else
							{
								$result = $mysqli->query("SELECT id,name,pol,price,simprice,photo FROM products");
							}
						}
						else
						{
							$result = $mysqli->query("SELECT id,name,photo FROM manufacturers");
							$notSearchAndMan = true;
						}
					}
					while ($row = $result->fetch_assoc())
					{
						echo '<figure class="product">';
						echo ($notSearchAndMan) ?  '<a href="index.php?idman='.$row["id"].'">' : '<a href="product.php?id='.$row["id"].'">';
						echo '<div class="mainimage" style="background-image: url(\'./media/img/products/'.$row["photo"].'\');"></div>';
						echo ($notSearchAndMan) ? '<h3>Аккумуляторные батареи<br>'.$row["name"].'</h3>' :'<h3>Аккумуляторная батарея<br>'.$row["name"].' '.($row["pol"] ? 'Прямая' : 'Обратная').'</h3>';
						if(!$notSearchAndMan)
						{
							echo '<figure class="prbottom">
							<figure></a>
							<p class="price">'.$row["price"].'р</p>
							</figure>';
							if(isset($_SESSION["prods"]))
							{
								if(array_key_exists($row["id"],$_SESSION["prods"]))
								{
									if($_SESSION["prods"][$row["id"]] > 0)
									{
								echo '<button id="buy'.$row["id"].'" style="display:none;" onclick="addtocart('.$row["id"].')">купить</button>
								<figure class="countcontr" style="display:flex;" id="cart'.$row["id"].'"><button onclick="minuscart('.$row["id"].')">-</button><output id="count'.$row["id"].'">'.$_SESSION["prods"][$row["id"]].'</output><button onclick="pluscart('.$row["id"].')">+</button></figure>';
									}
									else
									{
								echo '<button id="buy'.$row["id"].'" onclick="addtocart('.$row["id"].')">купить</button>
								<figure class="countcontr" id="cart'.$row["id"].'"><button onclick="minuscart('.$row["id"].')">-</button><output id="count'.$row["id"].'">1</output><button onclick="pluscart('.$row["id"].')">+</button></figure>';
									}
								}
								else
								{
								echo '<button id="buy'.$row["id"].'" onclick="addtocart('.$row["id"].')">купить</button>
								<figure class="countcontr" id="cart'.$row["id"].'"><button onclick="minuscart('.$row["id"].')">-</button><output id="count'.$row["id"].'">1</output><button onclick="pluscart('.$row["id"].')">+</button></figure>';
								}
							}
							else
							{						
								echo '<button id="buy'.$row["id"].'" onclick="addtocart('.$row["id"].')">купить</button>
								<figure class="countcontr" id="cart'.$row["id"].'"><button onclick="minuscart('.$row["id"].')">-</button><output id="count'.$row["id"].'">1</output><button onclick="pluscart('.$row["id"].')">+</button></figure>';
							}
						}
						else
						{
							echo '</a>';
						}
						echo '</figure>
						</figure>';
					}

					if($notSearchAndMan)
					{
						echo '<figure class="product"><a href="index.php?idman=0"><div class="mainimage" style="background-image: url(\'./media/img/products/sputnik.jpg\');"></div><h3>Все аккумуляторные батареи</h3></figure>';
					}
				?>
			</div>
		</div>
	</section>

<script type="text/javascript">
	var idman = document.getElementById("idman");
	var pol = document.getElementById("pol");
	var wmark = document.getElementById("wmark");
	var bolt = document.getElementById("bolt");

	var upah = document.getElementById("upah");
	var dnah = document.getElementById("dnah");

	var upx = document.getElementById("upx");
	var dnx = document.getElementById("dnx");

	var upy = document.getElementById("upy");
	var dny = document.getElementById("dny");

	var upz = document.getElementById("upz");
	var dnz = document.getElementById("dnz");

	var uptph = document.getElementById("uptph");
	var dntph = document.getElementById("dntph");

	var upprice = document.getElementById("upprice");
	var dnprice = document.getElementById("dnprice");
	function startfilter()
	{
		window.open("/index.php?filter=1" + (idman.selectedIndex > 0 ? "&idman="+idman.value : "") + (pol.selectedIndex > 0 ? "&pol="+(pol.value-1) : "")+ (wmark.selectedIndex > 0 ? "&wmark="+(wmark.value-1) : "")+ (bolt.selectedIndex > 0 ? "&bolt="+(bolt.value-1) : "")+ (upah.value != "" ? "&upah="+upah.value : "")+ (dnah.value != "" ? "&dnah="+dnah.value : "")+ (upx.value != "" ? "&upx="+upx.value : "")+ (dnx.value != "" ? "&dnx="+dnx.value : "")+ (upy.value != "" ? "&upy="+upy.value : "")+ (dny.value != "" ? "&dny="+dny.value : "")+ (upz.value != "" ? "&upz="+upz.value : "")+ (dnz.value != "" ? "&dnz="+dnz.value : "")+ (uptph.value != "" ? "&uptph="+uptph.value : "")+ (dntph.value != "" ? "&dntph="+dntph.value : "")+ (upprice.value != "" ? "&upprice="+upprice.value : "")+ (dnprice.value != "" ? "&dnprice="+dnprice.value : ""),"_self");
	}

	function resetfilter()
	{
		idman.selectedIndex = 0;
		pol.selectedIndex = 0;
		wmark.selectedIndex = 0;
		bolt.selectedIndex = 0;
		upah.value = "";
		dnah.value = "";
		upx.value = "";
		dnx.value = "";
		upy.value = "";
		dny.value = "";
		upz.value = "";
		dnz.value = "";
		uptph.value = "";
		dntph.value = "";
		upprice.value = "";
		dnprice.value = "";
	}
</script>
<?php
		include_once "footer.php";
?>
