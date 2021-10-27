<!DOCTYPE html>
<html>
<head>
	<title>Delete Item</title>
	<style>
		table, td, th, tr, h3
        {
			border: 1px solid black;
			border-collapse: collapse;
			width: 400px;
			text-align: center;
			height: 25px;
            font-family: montserrat;
		}
        body{
            background-image: url('images/bg5.jpeg');
            background-size: cover;
        }
	</style>
</head>
<body>
	<h3
    >Here is the menu with the items' ids: </h3
    >

	<table>
		<tr>
            <tr>
                <th colspan="3" style="color: white; font-size: 150%;">Menu</th>
            </tr>
			<th>Item ID</th>
			<th style="width: 1000   px">Item Name</th>
		</tr>

	<?php
		session_start();
		$rid = $_SESSION['rid'];
		try {
			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM Menu WHERE rid = '$rid'";

            try {
            	$qval = $dbcon->query($query);
            	$info = $qval->fetchAll();

            	foreach ($info as $row) {

            		?>
            			<tr>
            				<td><?php echo $row['iid'];?></td>
            				<td><?php echo $row['iname'];?></td>
            			</tr>
            		<?php
            		}
            		?>
            	</table><br>

            	<form action="delete_item_proc.php" method="GET">
            		<p>Enter the item id to delete it: </p>
            		<input type="text" name="x">
            		<input type="submit" value="DELETE">
            	</form><br>
            	<button type="button" onclick="back_home()" style=" font-size: 200%;">Home</button>
        		<button type="button" onclick="back()" style=" font-size: 200%;">Menu</button><br>

				<br><input type="button" value="Sign Out" id="signout" style="font-size: 150%;">

	            <script>

	                var elm=document.getElementById('signout');
            		elm.addEventListener('click', processlogout);
                    
            		function processlogout(){

                		window.location.assign('res_logout.php');
                
            		}

            		function back_home(){
                		window.location.assign('res_home.php');
            		}

            		function back(){
            			window.location.assign('menu.php');
           			}

	            </script>

            	<?php	
            } catch (PDOException $ex) {
            	
            }
		} catch (PDOException $ex) {
			
		}
	?>
</body>
</html>