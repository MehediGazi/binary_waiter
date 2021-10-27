<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		#fields {
			color: brown;
			font-size: 135%;
			font-weight: bold;
			text-align: left;
			font-family: cocomat;
		}
		input, textarea{
			font-size: 100%;
		}
		h1{
			text-align: left;
			font-weight: bold;
			font-family: montserrat;
		}

		body{
			background-image: url('images/bg14.jpeg');
			background-size: cover;
		}
	</style>
</head>
<body>
	<h1>Sign Up Here:</h1>
	<form action="res_register.php" method="POST" enctype="multipart/form-data">
		<p id="fields">
			Name: &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
			<input type="text" name="rname" > <br><br>
			Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<input type="email" name="rmail"><br><br>
			Password:  &nbsp&nbsp&nbsp&nbsp&nbsp
			<input type="password" name="rpass"><br><br>
			VAT and SC: &nbsp&nbsp
			<input type="text" name="vat"><br><br>
			Address: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <br>
			<textarea id="radd" name="radd" rows="2" cols="34"></textarea><br><br>
			Number: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<input type="text" name="rnum"><br><br>
			Area: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<input type="text" name="rarea"><br><br>
			Total Tables: &nbsp&nbsp	
			<input type="text" name="tabs"><br><br>
			Profile Picture:
			<input type="file" name="rimg" id="rimg">
			<p style="font-size: 120%;"><input type="submit" value="Register" id="fields"></p>
		</p>
	</form>
	<button onclick="myfunc()" style="font-size: 130%; color: black;" id="fields">Log In</button><br><br>
	<button onclick="home()" style="font-size: 110%; color: black;" id="fields">HomePage</button>

	<script>
		function myfunc(){
				window.location.assign('res_login.php')
			}
		function home(){
			window.location.assign('http://localhost/binary_waiter/')
		}
	</script>
</body>
</html>