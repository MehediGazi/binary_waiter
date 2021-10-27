<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HomePage</title>
	<title></title>
	<style>
		#fields {
			color: brown;
			font-size: 150%;
			font-weight: bold;
			font-family: cocomat;
		}
		input{
			font-size: 120%;
			border-color: black;
		}
		#cush{
			
			font-weight: bold;
			font-family: montserrat;
		}

		#resh{
			font-weight: bold;
			font-family: montserrat;
		}

		.alignleft{
			float: left;
			margin-right: 730px;
		}
		.alignright{
			float: right;

		}

		body{
			background-image: url('images/bg3.jpg');
			background-size: cover;
		}
	</style>
</head>
<body>
	<h1 style="text-align: center; color: orange; font-size: 50px; font-family: montserrat">Welcome to Binary Waiter</h1>
	<div class="alignleft">
	<br>
	<h1 id="cush">Login as Customer</h1>
	<form action="verify_cus.php" method="POST">
		<p id="fields">
		Email: <br><input type="cmail" name="cmail"><br><br>
		Password:<br> <input type="password" name="cpass"><br><br>

		<input type="submit" value="Sign In">
		
	</form>
	<button onclick="cus_sign()">Sign Up</button>
	</div>

<div lass="alignright">
	<br>
	<h1 id="resh">Login as Restaurant</h1>
	<form action="verify_res.php" method="POST">
		<p id="fields">
		Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
		<input type="email" name="rmail"><br><br>
		Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
		<input type="password" name="rpass"><br><br>

		<input type="submit" value="Sign In" style="margin-right: 205px">
		</p>
	</form>
	<button onclick="res_sign()">Sign Up</button>
</div>
	<script>
		function cus_sign(){
			window.location.assign('cus_sign_up.php')
		}
		function res_sign(){
			window.location.assign('res_sign_up.php')
		}
	</script>
</body>
</html>