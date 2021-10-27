<head>
	<meta http-equiv="refresh" content="5">
</head>

<style>
        table, td, th, tr{
            border: 2px solid black;
            border-collapse: collapse;
            width: 300px;
            text-align: center;
            height: 30px;
            font-family: montserrat;
            
        }

        th{
            font-size: 20px;
        }

        #info{
            font-weight: bold;
            font-size: 22px;
        }

        table.center{
        	margin-left: auto;
        	margin-right: auto;
        }

        body{
            background-image: url('images/bg6.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
  			background-attachment: fixed;
        }
</style>

<div style="text-align: center;"><button onclick="back()">Back</button>
<button onclick="reload()">Refresh</button><br></div>	

<script>
	function back() {
		window.location.assign("res_home.php")
	}
	function reload(){
		location.reload();
	}
</script>

<body>

<?php

	try {
		$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		session_start();
	    $rid = $_SESSION['rid'];

	    $query = "SELECT * FROM OrderDetails Where rid = $rid ORDER BY oid DESC LIMIT 0, 15";

	    try {
	    	$qval = $dbcon->query($query);
	    	$info = $qval->fetchAll();
	    	foreach ($info as $row){
	    		$oid = $row['oid'];
	    		$bill = $row['bill'];
	    		$cid = $row['cid'];
	    		$stat = $row['stat'];
	    		$otime = $row['otime'];
	    		$stime = $row['stime'];
	    		$paid = $row['paid'];

	    		$date2 = date_create($otime);
	    		?>
	    		
	    		<table style="margin-top: 10px;" class="center">
	    			<tr>
                		<th colspan="5" style="color: black; font-size: 150%;">Order ID: <?php echo $oid ?></th>
            		</tr>
            		<tr>
            			<th>Item Name</td>
            			<th>Quantity</td>
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
		    					</tr>
		    				<?php
		    			}
		    		} catch (PDOException $ex) {
		    			
		    		}
	    		?>
	    		<tr>
            		<th colspan="5" style="color: black; font-size: 100%;">Order Time: <?php echo date_format($date2, 'g:i A - j M y'); ?></th>
        		</tr>
            	<?php
            		if($stat == 0){
            			$date1 = date_create($stime);
            			if($stime == NULL){
	            			?>
	            			<tr>
		                		<th colspan="5" style="color: red; font-size: 150%; height: 40px;">
		                			<a href="res_stime.php?t=10&oid=<?php echo $oid ?>"><button style="color: green; font-weight: bold;">10 Mins</button></a>
		                			<a href="res_stime.php?t=30&oid=<?php echo $oid ?>"><button style="color: orange; font-weight: bold;">30 Mins</button></a>
		                			<a href="res_stime.php?t=50&oid=<?php echo $oid ?>"><button style="color: red; font-weight: bold;">50 Mins</button></a>	
		                		</th>
	            			</tr>
	            			<?php
	            		}else{
            				?>
	            			<tr>
		                		<th colspan="5" style="color: orange; font-size: 13	0%; height: 60px;">
		                			Serve by <?php echo date_format($date1, "g:i A"); ?>
		                			<br><a href="res_status_change.php?oid=<?php echo $oid ?>">
		                				<button style="color: green; font-weight: bold;">Ready to Serve</button>
		                			</a>
		                		</th>
	            			</tr>
	            			<?php
	            			}
            		}else{
            			?>
            			<tr>
                		<th colspan="5" style="color: green; font-size: 150%;">Order is Completed</th>
            			</tr>
            			<?php
            		}
            		if($paid==1){
	    				?>
	        			<tr>
	                		<th colspan="5" style="color: white	; font-size: 130%; height: 30px; background-color: green">
	                			PAID
	                		</th>
	        			</tr>
	        			<?php
	    			}else{
	    				?>
	        			<tr>
	                		<th colspan="5" style="color: white; font-size: 130%; height: 30px; background-color: orange">
	                			NOT PAID
	                		</th>
	        			</tr>
	        			<?php
	        		}	
            	?>
	    		</table>
	    		<?php
	    	}
	    } catch (Exception $e) {
	    	
	    }

	} catch (Exception $e) {
		
	}

?>

</body>