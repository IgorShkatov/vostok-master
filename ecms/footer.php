<dialog id="acceptform">
	<form>
		<h2 id="acceptmessage"></h2>
		<input onclick="closeaccept()" type="button" name="" value="Хорошо">
	</form>
</dialog>
<script type="text/javascript">
	var acceptform = document.getElementById("acceptform");

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
</script>
</main>
</body>
</html>