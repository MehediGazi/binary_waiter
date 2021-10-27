<!DOCTYPE html>
<html>
<head>
	<title>Find Restaurant</title>

	<style>

	.div1{
		size: 200%;
		font-family: montserrat;
	}

	body{
            background-image: url('images/bg11.jpg');
            background-size: cover;
        }
</style>

	
</head>
<body>
	<div class="div1">
	<h3>Enter the name of the restaurant:</h3>
	<form action="res_find_proc.php" method="GET">
		<input type="text" name="x">
		<input type="submit" value="Search">
	</form>

	<br><a href="http://localhost/binary_waiter/res_list.php"><input type="button" value="See all Restaurants"></a>
	<input type="button" value="Home" onclick="home()"><br><br></div>

	<script>
		function home(){
			window.location.assign('cus_home.php')
		}
	</script>
</body>
</html>