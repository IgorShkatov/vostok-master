<?php
		$title="Vostok TS";
		include_once "header.php";
		$new = "";
		if(isset($_GET["id"]))
		{
			$new = htmlspecialchars($_GET["id"]);
		}
?>
<section class="former">
	<h1>Производитель</h1>
	<form action="manman.php">
	<label for="name">Имя</label>
	<?php
		if(isset($_GET["id"]))
		{
			$result = $mysqli->query("SELECT id,name FROM manufacturers WHERE id=".$new);
			while ($row = $result->fetch_assoc())
			{
				echo '<input type="text" id="name" value="'.$row["name"].'" name="name"><input type="hidden" name="upd" value="1"><input type="hidden" name="id" value="'.$_GET["id"].'">';
			}
		}
		else
		{
			echo '<input type="text" id="name" name="name"><input type="hidden" name="upd" value="0">';
		}
?>
	<input type="submit" name="">
</form>
</section>
<?php
	include_once "footer.php";
?>