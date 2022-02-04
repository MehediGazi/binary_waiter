<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<style>
		table, td, th, tr, h2{
			border: 1px solid black;
			border-collapse: collapse;
			width: 500px;
			text-align: center;
			height: 30px;
			font-family: montserrat;
		}

		body{
            background-image: url('images/bg5.jpeg');
            background-size: cover;
        }
	</style>
</head>
<body>
	<h2>Here is your menu</h2>

	<table>
		<tr>
            <th colspan="4" style="color: white; font-size: 150%;">Menu</th>
        </tr>
		<tr>
			<th>Item Name</td>
			<th>Item Price</td>
			<th>Category</td>
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
            				<td><?php echo $row['iname'];?></td>
            				<td><?php echo $row['price'];?></td>
            				<td><?php echo $row['cat'];?></td>
            			</tr>
            		<?php
            		}
            		?>
            	</table><br>

            	<button type="button" onclick="add_item()">Add Itemm</button>
            	
            	<button type="button" onclick="change_item()">Update Item</button><br><br>

            	<button type="button" onclick="back_home()">Home</button>

				<input type="button" value="Sign Out" id="signout">

	            <script>
	                var elm=document.getElementById('signout');
	                elm.addEventListener('click', processlogout);
	                
	                function processlogout(){

	                    window.location.assign('res_logout.php');
	            
	                }

	                function back_home(){
                		window.location.assign('res_home.php');
            		}

            		function add_item(){
	                    window.location.assign("add_item.php");
	                }


            		function change_item(){
                		window.location.assign('change_item.php');
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