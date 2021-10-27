<head>
	<meta http-equiv="refresh" content="5">
</head>

<style>
        table, td, th, tr{
            border: 2px solid black;
            border-collapse: collapse;
            width: 570px;
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
            font-family: montserrat;
        }

        table.center{
        	margin-left: auto;
        	margin-right: auto;
        }

        body{
            background-image: url('images/bg12.jpg');
            background-size: cover;
        }
</style>


<?php
try {
	$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$oid = $_GET['oid'];
	$rname = $_GET['rname'];
	$bill = (int)$_GET['bill'];
	$vat = (int)$_GET['vat'];
	$tdiff = (int)$_GET['tdiff'];
	$stat = (int)$_GET['stat'];

	$total_bill = $bill+$vat;

	$sql = "SELECT iname, quan, price, paid, stat FROM Orders as o JOIN Menu as m ON o.iid=m.iid JOIN OrderDetails as od ON o.oid = od.oid where o.oid = $oid";
	try {
		$qvalue = $dbcon->query($sql);
		$info = $qvalue->fetchAll();
		?>
		<br>
		<table class="center">
			<tr>
				<th colspan="4"><div>Order ID: <?php echo $oid;?></div>
				<div>Restaurant: <?php echo $rname;?></div></th>
			</tr>
			<?php
			if($stat){
				?>
				<tr><th colspan="4" style="color: green;">Served</th></tr>
				<?php
			}else{

				if($tdiff == 0){
					?>
					<tr><th colspan="4" style="color: brown;">Not Served Yet</th></tr>
					<?php
				}elseif($tdiff < 0){
					?>
					<tr><th colspan="4" style="color: brown;">Got Delayed by <?php echo $tdiff * (-1);?> Mins</th></tr>
					<?php
				}else{
					?>
					<tr><th colspan="4" style="color: green;">Serving in <?php echo $tdiff;?> Mins</th></tr>
					<?php
				}
			}
			?>
			<tr><th style="width: 1100px;">Item</th><th>Price</th><th style="width: 100px;">Quantity</th><th style="width: 800px;">Total Price</th></tr>
		<?php
		foreach ($info as $row) {
			?>
			<tr>
				<td style="width: 700px;"><?php echo $row['iname'];?></td>
				<td style="width: 100;"><?php echo $row['price'];?></td>
				<td style="width: 150px;"><?php echo $row['quan'];?></td>
				<td><?php echo $row['price']*$row['quan'];?></td>
			</tr>
			<?php
		}
		?>
			<tr><td colspan="3">Bill </td><td><?php echo $bill?></td></tr>
			<tr><td colspan="3">VAT </td><td><?php echo $vat?></td></tr>	
			<tr><th colspan="3">Total Bill </th><th><?php echo $total_bill?></th></tr>
			<?php
				$paid = $row['paid'];
				if($paid){
					?><tr style="background-color: green;"><td colspan="5" style="font-weight: bold">Bill Paid</td></tr><?php
				}else{
					?><tr style="background-color: red;"><td colspan="5">PLEASE PAY THE BILL</td></tr><?php
				}
			?>
		</table><br>
		<div style="text-align: center;">
			<button onclick="reload()">Refresh</button><br><br>
			<button onclick="back()">Back</button>
			<button onclick="home()">Home</button><br></div>

		<script>
			function back(){
			window.history.back();
		}

		function home(){
			window.location.assign("cus_home.php");
		}
		function reload(){
			location.reload();
		}
		</script>
		<?php
	} catch (Exception $e) {
		
	}
	
} catch (Exception $e) {
	
}
?>
