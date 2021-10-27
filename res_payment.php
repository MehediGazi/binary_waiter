<style>
        table, td, th, tr{
            border: 2px solid black;
            border-collapse: collapse;
            width: 307px;
            text-align: center;
            height: 30px;
            font-family: montserrat;
            
            
        }

        th{
            font-size: 18px;
        }

        #info{
            font-weight: bold;
            font-size: 22px;
        }

        table{
        	background-color: #A1C956;
        }
</style>

<button onclick="back()">Back</button>
<button onclick="reload()">Refresh</button><br>

<script>
		function back(){
		window.history.back();
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
	$sql = "SELECT * from OrderDetails where rid = $rid ORDER BY oid desc";
	try {
		$qvalue = $dbcon->query($sql);
		$info = $qvalue->fetchAll();
		foreach ($info as $row) {
			$oid = $row['oid'];
			$cid = $row['cid'];
			$bill = $row['bill'];
			$vat = $row['vat'];
			$paid = $row['paid'];
			$total_bill = $bill + $vat;

			$sql1 = "SELECT * from Customers where cid = $cid";
			try {
				$qvalue1 = $dbcon->query($sql1);
				$info1 = $qvalue1->fetchAll();
				foreach ($info1 as $row1) {
					$fname = $row1['fname'];
					$lname = $row1['lname'];
					$cname = $fname . " " . $lname;
				}
			} catch (Exception $e) {
				
			}
			?>
			<table style="margin-top: 30px; float: left; margin-right: 35px; border: 4px solid green;">
				<tr><th>Order ID: <?php echo $oid;?></th></tr>
				<tr><th>Name: <?php echo $fname . " " . $lname;?></th></tr>
				<tr><th>Bill: <?php echo $bill;?> Taka</th></tr>
				<tr><th>VAT: <?php echo $vat;?> Taka</th></tr>
				<tr><th>Total Bill: <?php echo $total_bill;?> Taka</th></tr>
			
			<?php

			if(!$paid){
				?>
				<tr><th style="color: white; background-color: orange;">"Not Paid Yet"&nbsp 
					<a href="res_payment_proc.php?oid=<?php echo $oid ?> & pflag=1">
						<button style="font-weight: bold; color: red;">Paid</button></a></th></tr>
				<?php
			}else{
				?>
				<tr><th style="color: white; background-color: #4E7700;">Payment Completed</th></tr>
				<?php
			}
			?>
				<tr><th><a href="res_order_detail.php?oid=<?php echo $oid?> & cname=<?php echo $cname?> & bill=<?php echo $bill?> & vat=<?php echo $vat?>" style="color: #DB6203;">
					See Details</a></th></tr>
			</table>
			<?php
		}
	} catch (Exception $e) {
		
	}
} catch (Exception $e) {
	
}
?>
</body>