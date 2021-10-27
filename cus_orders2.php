<style>
        table, td, th, tr{
            border: 2px solid black;
            border-collapse: collapse;
            width: 500px;
            text-align: center;
            height: 30px;
        }

        th{
            font-size: 20px;
        }

        #info{
            font-weight: bold;
            font-size: 22px;
        }
    </style>


<?php

	try {
		$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    session_start();
	    $cid = $_SESSION['cid'];

	    $query = "SELECT * FROM OrderDetails Where cid = $cid ORDER BY oid DESC LIMIT 0, 15";

	    try {
	    	$qval = $dbcon->query($query);
	    	$info = $qval->fetchAll();
	    	foreach ($info as $row) {
	    		$oid = $row['oid'];
	    		$bill = $row['bill'];
	    		$rid = $row['rid'];
	    		$stat = $row['stat'];
	    		$otime = $row['otime'];
	    		$date2 = date_create($otime);
	    		?>
	    		<table>
	    			<tr>
                		<th colspan="5" style="color: black; font-size: 150%;">Order ID: <?php echo $oid ?></th>
            		</tr>
            		<tr>
                		<th colspan="5" style="color: black; font-size: 100%;">Order Time: <?php echo date_format($date2, 'g:i A - j M y'); ?></th>
            		</tr>
            		<tr>
            			<th>Item Name</td>
            			<th>Quantity</td>
            			<th>Price</td>
        			</tr>
	    		<?php
	    		$query1 = "SELECT * FROM Orders WHERE oid = $oid";
	    		try {
	    			$qval1 = $dbcon->query($query1);
	    			$info1 = $qval1->fetchAll();
	    			foreach ($info1 as $row1) {
	    				$quan = $row1['quan'];
	    				$iid = $row1['iid'];
	    				$query2 = "SELECT * FROM Menu WHERE iid = $iid";
	    				try {
	    					$qval2 = $dbcon->query($query2);
	    					$info2 = $qval2->fetchAll();
	    					foreach ($info2 as $row2) {
	    						$iname = $row2['iname'];
	    						$price = $row2['price'] * $quan;
	    					}
	    				} catch (PDOException $ex) {
	    					
	    				}
	    				?>
	    					<tr>
	    						<td><?php echo $iname; ?></td>
	    						<td><?php echo $row1['quan']; ?></td>
	    						<td><?php echo $price; ?></td>
	    					</tr>
	    				<?php
	    			}
	    		} catch (PDOException $ex) {
	    			
	    		}
	    		?>
	    		<tr>
                	<th colspan="5" style="color: blue; font-size: 120%;">Total Bill: <?php echo $bill ?> TAKA</th>
            	</tr>
            	<?php
            		if($stat == 0){
            			?>
            			<tr>
                		<th colspan="5" style="color: red; font-size: 150%;">Status: Not Completed</th>
            			</tr>
            			<?php
            		}else{
            			?>
            			<tr>
                		<th colspan="5" style="color: green; font-size: 150%;">Status: Completed</th>
            			</tr>
            			<?php
            		}
            	?>
	    		</table>
	    		<br>
	    		<?php
	    	}
	    } catch (PDOException $ex) {
	    	
	    }

	} catch (PDOException $ex) {
		
	}

?>