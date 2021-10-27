<head>
	<meta http-equiv="refresh" content="5">
</head>

<style>
        table, td, th, tr{
            border: 2px solid black;
            border-collapse: collapse;
            width: 320px;
            text-align: center;
            height: 30px;
            font-family: montserrat;
            
        }

        th{
            font-size: 17px;
        }

        #info{
            font-weight: bold;
            font-size: 22px;
        }

        table{
        	background-color: #FFE800;
        }
</style>

<button onclick="back()">Back</button>
<button onclick="reload()">Refresh</button><br>

<?php
try {
	$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	session_start();
	$cid = $_SESSION['cid'];
	date_default_timezone_set('Asia/Dhaka');
	$cnt = date("H:i");
	$sql = "SELECT * from OrderDetails where cid = $cid ORDER BY oid desc";
	try {
		$qvalue = $dbcon->query($sql);
		$info = $qvalue->fetchAll();
		foreach ($info as $row) {
			$oid = $row['oid'];
			$rid = $row['rid'];
			$bill = $row['bill'];
			$vat = $row['vat'];
			$paid = $row['paid'];
			$total_bill = $bill + $vat;
			$stat = $row['stat'];
			$cst = date_create($row['stime']);
			$stime = date_create(date_format($cst, "H:i"));
			$ntime = date_create($cnt);

			$sh = (int)date_format($stime, "H");
			$nh = (int)date_format($ntime, "H");
			$sm = (int)date_format($stime, "i");
			$nm = (int)date_format($ntime, "i");

			$tdiff = (($sh*60)+$sm) - (($nh*60)+$nm);

			$sql1 = "SELECT * from Restaurants where rid = $rid";
			try {
				$qvalue1 = $dbcon->query($sql1);
				$info1 = $qvalue1->fetchAll();
				foreach ($info1 as $row1) {
					$rname = $row1['rname'];
				}
			} catch (Exception $e) {
				
			}
			?>
			<table style="margin-top: 20px; float: left; margin-right: 25px; border: 4px solid green;">
				<tr><th>Order ID: <?php echo $oid;?></th></tr>
				<tr><th>Restaurant: <?php echo $rname;?></th></tr>
				<tr><th>Bill: <?php echo $bill;?> Taka  &nbsp|&nbsp 
				VAT: <?php echo $vat;?> Taka</th></tr>
				<tr><th>Total Bill: <?php echo $total_bill;?> Taka</th></tr>
			
			<?php

			if(!$paid){
				?>
				<tr><th style="color: red;">Payment Not Completed</th></tr>
				<?php
			}else{
				?>
				<tr><th style="color: green;">Payment Completed</th></tr>
				<?php
			}
			if($stat){
				?>
				<tr><th style="color: green;">Served</th></tr>
				<?php
			}else{

				if($tdiff == 0){
					?>
					<tr><th style="color: brown;">Not Served Yet</th></tr>
					<?php
				}elseif($tdiff < 0){
					?>
					<tr><th style="color: brown;">Got Delayed by <?php echo $tdiff * (-1);?> Mins</th></tr>
					<?php
				}else{
					?>
					<tr><th style="color: green;">Serving in <?php echo $tdiff;?> Mins</th></tr>
					<?php
				}
			}
			?>
				<tr><th style="background-color: #FFA600;"><a href="cus_order_detail.php?oid=<?php echo $oid?> & rname=<?php echo $rname?> & bill=<?php echo $bill?> & vat=<?php echo $vat?> & tdiff=<?php echo $tdiff?> & stat=<?php echo $stat?>" style="color: black;">See Details</a></th></tr>
			</table>
			<?php
		}
	} catch (Exception $e) {
		
	}
} catch (Exception $e) {
	
}
?>

<script>
		function back(){
		window.history.back();
	}

	function reload(){
		location.reload();
	}
	</script>