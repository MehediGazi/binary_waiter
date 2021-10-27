<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer Login Page</title>
	<title></title>
	<style>
		#fields {
			font-size: 150%;
			font-weight: bold;
			font-family: cocomat;
			color: brown;
		}
		input{
			font-size: 120%;
		}
		h1{
			margin-right: 235px;
			font-weight: bold;
			font-family: montserrat;
			font-size: 2.5em;
		}
		body{
			background-image: url('images/bg14.jpeg');
			background-size: cover;
		}
	</style>
</head>
<body>
	<h1>Customer Login Page</h1>
	<form action="verify_cus.php" method="POST">
		<p id="fields">
		Email: <br><input type="cmail" name="cmail"><br><br>
		Password:<br> <input type="password" name="cpass"><br>
		</p>
		<input type="submit" value="Sign In" id="fields"><br><br>
		
	</form>
	<button onclick="myfunc()" style="font-size: 110%; color: black" id="fields">Sign Up</button><br><br>
	<button onclick="home()" style="font-size: 100%; color: black" id="fields">HomePage</button>
	<script>
		function myfunc(){
			window.location.assign('cus_sign_up.php')
		}
		function home(){
			window.location.assign('http://localhost/binary_waiter/')
		}
	</script>
</body>
</html>