<?php
	
	try {

		$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        session_start();
        $rid = $_SESSION['rid'];
        $cid = $_SESSION['cid'];
        $vat = $_SESSION['vat'];
        $rname = $_SESSION['rname'];

        $queryc = "SELECT * FROM Menu Where rid = '$rid'";
        try {
        	$tq = 0;
        	$qvalc = $dbcon->query($queryc);
        	$infoc = $qvalc->fetchAll();
        	foreach ($infoc as $row) {
        		$tq = $tq + $_GET[$row['iid']];
        	}
        	if($tq == 0){
        		?>
        		<script>
        			window.alert("No item is selected. Try again.");
        			window.location.assign("res_profile.php?rid=<?php echo $rid ?>");
        		</script>
        		<?php
        	}else{
        		$query = "INSERT into OrderDetails(rid, cid, otime) Values($rid, $cid, now())";

		        try {
		        	$dbcon->exec($query);
		        } catch (PDOException $ex) {
		        	
		        }

		        $query1 = "SELECT * from OrderDetails Where otime = now()";

		        try {
		        	$qval = $dbcon->query($query1);
		        	$info = $qval->fetchAll();
		        	foreach ($info as $row) {
		        		$oid = $row['oid'];
		        	}

		        } catch (PDOException $ex) {
		        	
		        }

		        $query2 = "SELECT * FROM Menu Where rid = '$rid'";

		        try {
		        	$bill = 0;
		        	$qval2 = $dbcon->query($query2);
		        	$info2 = $qval2->fetchAll();
		        	foreach ($info2 as $row1) {
		        		$quan = $_GET[$row1['iid']];
		        		if($quan > 0){
		        			$price = $row1['price'];
		        			$iid = $row1['iid'];

		        			$bill = $bill+ ($quan * $price);

		        			$query3 = "INSERT INTO Orders VALUES($oid, $rid, $iid, $quan)";

		        			try {
		        				$dbcon->exec($query3);
		        			} catch (PDOException $ex) {
		        				
		        			}
		        			
		        		}
		        	}

		        	$vat_val = ($bill * ($vat/100));
					$query4 = "UPDATE OrderDetails SET bill = $bill, vat = $vat_val WHERE oid = $oid";

					try {
						$dbcon->exec($query4);
						?>
						<script>
							window.alert("Order has been placed. Please Pay the Bill First!")
							window.location.assign("cus_order_detail.php?oid=<?php echo $oid?> & rname=<?php echo $rname?> & bill=<?php echo $bill?> & vat=<?php echo $vat_val?> & tdiff=0 & stat=0");
						</script>
						<?php
					} catch (PDOException $ex) {
						
					}

		        } catch (PDOException $ex) {
		        	
		        }
		        	}
		        } catch (PDOException $ex) {
		        	
		        }
		
	} catch (PDOException $ex) {
		
	}

?>