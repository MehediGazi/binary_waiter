<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		#fields {
			color: brown;
			font-size: 130%;
			font-weight: bold;
			text-align: right;
			font-family: cocomat;
		}
		input{
			font-size: 120%;
		}
		h1{
			text-align: right;
			margin-right: 235px;
			font-weight: bold;
			font-family: montserrat;
		}
		body{
			background-image: url('images/bg1.jpeg');
			background-size: cover;
		}
	</style>
</head>
<body>
	<h1>Sign Up Here:</h1>
	<form action="cus_register.php" method="POST">
		<p id="fields">
			First Name: &nbsp &nbsp<input type="text" name="fname" > <br><br>
			Last Name: &nbsp&nbsp&nbsp<input type="text" name="lname"></input> <br><br>
			Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="cmail" name="cmail"><br><br>
			Password:  &nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="cpass"><br><br>
			<span style="margin-right: 240px;">Address: </span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <br>
			<textarea id="cadd" name="cadd" rows="3" cols="54"></textarea><br><br>
			Number: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cnum"><br><br>
			Area: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="carea"><br><br>
			<span style="float: right;">
			Profile Picture:
			<input type="file" name="rimg" id="rimg"></span><br>
			<p style="text-align: right; font-size: 120%;"><input type="submit" value="Register" id="fields"></p>
		</p>
	</form>
	<button onclick="myfunc()" style="float: right; font-size: 150%; color: black" id="fields">Log In</button>
	<br><br><br>
	<button onclick="home()" style="float: right; font-size: 120%; color: black" id="fields">HomePage</button>
	<script>
		function myfunc(){
				window.location.assign('cus_login.php')
			}
			function home(){
			window.location.assign('http://localhost/binary_waiter/')
		}
	</script>
</body>
</html>