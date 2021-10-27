<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Restaurant's Login Page</title>
	<title></title>
	<style>
		#fields {
			color: brown;
			font-size: 150%;
			font-weight: bold;
			font-family: cocomat;
			text-align: right;
			margin-right: 100px;
		}
		input{
			font-size: 120%;
		}
		h1{
			font-weight: bold;
			font-family: montserrat;
			text-align: right;
		}

		body{
			background-image: url('images/bg1.jpeg');
			background-size: cover;
		}
	</style>
</head>
<body>
	<h1>Restaurant's Login Page</h1>
	<form action="verify_res.php" method="POST">
		<p id="fields">
		Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
		<input type="email" name="rmail"><br><br>
		Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
		<input type="password" name="rpass"><br><br>
		<input type="submit" value="Sign In" style="margin-right: 210px; font-size: 100%" id="fields"><br>
		</p>
	</form>
		<button onclick="myfunc()" style="float: right; margin-right: 330px; font-size: 89%; color: black" id="fields">Sign Up</button><br><br>
		<button onclick="home()" style="float: right; font-size: 100%; margin-right: 300px; color: black" id="fields">HomePage</button>
	<script>
		function myfunc(){
			window.location.assign('res_sign_up.php')
		}
		function home(){
			window.location.assign('http://localhost/binary_waiter/')
		}
	</script>
</body>
</html>