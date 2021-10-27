<!DOCTYPE html>
<html>
<head>
	<title>Change Item</title>
	<style>
		table, td, th, tr, h3{
			border: 1px solid black;
			border-collapse: collapse;
			width: 450px;
			text-align: center;
			height: 25px;
            font-family: montserrat;
		}

        input{
            font-family: montserrat;
            text-align: center;
        }

        body{
            background-image: url('images/bg5.jpeg');
            background-size: cover;
        }
	</style>
</head>
<body>
	<h3>Here is the menu with the items' ids</h3>

	<table>
            <tr>
                <th colspan="5" style="color: white; font-size: 150%;">Menu</th>
            </tr>
		<tr>
			<th>Item Name</th>
			<th>Price</th>
            <th>Catagory</th>
            <th>Delete</th>
			<th>Action</th>
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

				?>
				<?php

            	foreach ($info as $row) {

            		?>
            			<tr>
                            <form action="change_item_proc.php" method="GET">
                            <input type="hidden" name="iid" value="<?php echo $row['iid'];?>">  
                            <td><input type="text" name="iname" value="<?php echo $row['iname'];?>"></td>
                            <td><input type="text" name="price" value="<?php echo $row['price'];?>"></td>
                            <td><input type="text" name="cat" value="<?php echo $row['cat'];?>"></td>
            				<td><input type="checkbox" name="check" value="yes"></td>
                            <td><input type="submit" value="Update"><br></td>
                            </form>
            			</tr>
            		<?php
            		}
            		?>
            	</table><br>
                
                <button type="button" onclick="add_item()">Add Item</button><br><br>
            	<button type="button" onclick="back_home()" style=" font-size: 70%;">Home</button>
        		<button type="button" onclick="back()" style=" font-size: 70%;">Menu</button><br>

				<br><input type="button" value="Sign Out" id="signout" style="font-size: 60%;">

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

                    function add_item(){
                        window.location.assign("add_item.php");
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