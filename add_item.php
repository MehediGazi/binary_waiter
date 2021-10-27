<!DOCTYPE html>
<html>
<head>
	<title>Menu Update</title>

    <style>
        body{
            background-image: url('images/bg5.jpeg');
            background-size: cover;
        }
            h2,input{
                font-family: montserrat;
            }
    </style>
</head>
<body>
	<h2>Add a new item: </h2>

	<?php
		session_start();
		$rid = $_SESSION['rid'];
	?>

        <form action="add_item_proc.php" method="GET">
            Item Name: <br><input type="text" name="iname"><br><br>
            Item Price: <br><input type="text" name="price"><br><br>
            Catagory: <br><input type="text" name="cat"><br><br>
            <input type="submit" value="Add Item">
        </form>
        <br><br>
        <button type="button" onclick="back_home()" style=" font-size: 200%;">Home</button>
        <button type="button" onclick="back()" style="font-size: 200%;">Menu</button><br>

		<br><input type="button" value="Sign Out" id="signout" style="font-size: 150%;">

        <script>
          	var elm=document.getElementById('signout');
            elm.addEventListener('click', processlogout);
                    
            function processlogout(){

                window.location.assign('res_logout.php');
                
            }

            var elm2 = document.getElementById('homepage');
            elm2.addEventListener('click', back_home);

            function back_home(){
                window.location.assign('res_home.php');
            }

            function back(){
            	window.location.assign('menu.php');
            }

        </script>
</body>
</html>