<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление проекта</title>
</head>
<body>
	<main>
		<section>
			<form>
				<input type="file" id="photo" name="photo">
				<input type="button" onclick="sendData()" name="" value="Проверить">
			</form>
		</section>	
</main>
<script type="text/javascript">
function sendData() {

var file = document.querySelector('#photo').files[0];

	var xhr = new XMLHttpRequest();

	var fd = new FormData();
  	fd.append("photo", file);

  	xhr.open("POST", "https://api.findface.pro/v1/identify/");

	  // Combine the pairs into a single string and replace all %-encoded spaces to 
	  // the '+' character; matches the behaviour of browser form submissions.

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === 4) {
    console.log(this.responseText);
  }
});	  // Define what happens on successful data submission

	  // Set up our request

	  // Add the required HTTP header for form data POST requests
xhr.setRequestHeader("Authorization", "Token 19X8lQgBzKaHporx0XZU4UjZBeI6OESP");
xhr.setRequestHeader("Cache-Control", "no-cache");
	  // Finally, send our data.
	xhr.send(fd);
}
</script>
</body>
</html>