<!DOCTYPE html>
<html>
<head>
	<title>Find Restaurant</title>
	<style>
        table, td, th, tr{
            border: 2px solid black;
            border-collapse: collapse;
            width: 650px;
            text-align: center;
            height: 30px;
            font-family: montserrat
        }

        th{
            font-size: 20px;
        }

        #info{
            font-weight: bold;
            font-size: 18px;
            font-family: montserrat;
        }

        h3{
        	font-family: montserrat;
        }

        body{
            background-image: url('images/bg11.jpg');
            background-size: cover;
        }

    </style>
</head>
<body>
	<h3>Enter the name of the restaurant:</h3>
	<form action="res_find_proc.php" method="GET">
		<input type="text" name="x">
		<input type="submit" value="Search">
	</form>

	<br><a href="http://localhost/binary_waiter/res_list.php"><input type="button" value="See all Restaurants"></a>
	<input type="button" value="Home" onclick="home()"><br><br>

	<script>
		function home(){
			window.location.assign('cus_home.php')
		}
	</script>

	<?php

	if($_GET['flag']==1){
		$rid= $_GET['rid'];
	    try{
	        $dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	        $query="SELECT * FROM Restaurants WHERE rid='$rid'";

	        try{
	            $returnval=$dbcon->query($query);
	            $info = $returnval->fetchAll();

	            foreach ($info as $row) {
	            	$_SESSION['rid'] = $rid;
	            	$_SESSION['vat'] = $row['vat'];
	            	$_SESSION['rname'] = $row['rname'];
	                $res['rname'] = $row['rname'];
	                $res['rarea'] = $row['rarea'];
	                $res['rnum'] = $row['rnum'];
	                $res['rmail'] = $row['rmail'];
	                $tables = $row['tabs'];
	            }

	            $res['rid'] = $rid;

	        }catch(PDOException $ex){

	        }

	        $sql = "SELECT COUNT(stat) as total FROM
                (SELECT * from OrderDetails
                WHERE rid = $rid) tab
                WHERE stat = 1";
	        try {
	            $qval = $dbcon->query($sql);
	            $info = $qval->fetchAll();
	            foreach ($info as $row) {
	                $total_orders = $row['total'];
	            }
	        } catch (Exception $e) {
	            
	        }
	    }catch(PDOException $ex){

	    }

		?>

			<h3 style="color: blue;">Restaurant Found!</h3>
	        <p id='info'>Name: <?php echo $res['rname']; ?><br>
	        Area: <?php echo $res['rarea']; ?><br>
	        Email: <?php echo $res['rmail']; ?><br>
	        Number: <?php echo $res['rnum']; ?><br>
	        Availability: 
		        <?php
		        $avail = (($tables - $total_orders) * 100)/$tables;
		        if ($total_orders >= $tables) {
		            echo "Not Available";
		        }elseif($avail >= 90){
		            echo "Fully Available";
		        }else if($avail >= 60){
		            echo "Available";
		        }elseif ($avail >= 40) {
		            echo "Rush";
		        }elseif ($avail >= 25) {
		            echo "Very Rush";
		        }else{
		            echo "Not Available";
		        }
		        ?>
	        </p>

	        <form action="order_proc.php" method="GET">
	        <table>
	        	<tr>
                <th colspan="4" style="color: red; font-size: 150%;">Menu</th>
            	</tr>
	            <tr>
	            <th>Item Name</td>
	            <th>Item Price</td>
	            <th>Category</td>
	            	<th>Order</th>
	        </tr>
	        <?php
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
	                        <td><input type="number" id='quan' name="<?php echo $row['iid'] ?>" min="0" max="20" value="0"></td>
	                    </tr>
	                <?php
	                }
	                ?>

	                <tr>
                    <td colspan="5"><input type="submit" value="Order" style="color: red; font-size: 130%;"></td>
                </tr>
	            </table><br>
            	</form>

	            <?php   
	        } catch (PDOException $ex) {
	            
	        }

	        $_GET['flag'] = 0;
	}else{
		?>
		<h3 style="color: red;">Restaurant NOT Found!</h3>
		<?php
	}

	?>

</body>
</html>