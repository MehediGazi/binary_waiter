<style>
        table, td, th, tr{
            border: 2px solid black;
            border-collapse: collapse;
            width: 470px;
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
            background-image: url('images/bg8.jpeg');
            background-size: cover;
        }
</style>


<?php
try {
	$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$oid = $_GET['oid'];
	$cname = $_GET['cname'];
	$bill = (int)$_GET['bill'];
	$vat = (int)$_GET['vat'];

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
				<div>Name: <?php echo $cname;?></div></td>
			</tr>
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
					?><tr style="background-color: #EA3C00;"><td colspan="5">BILL HASN'T BEEN PAID <a href="res_payment_proc.php?oid=<?php echo $oid ?> & pflag=0">
						<button style="font-weight: bold; color: red;">Paid</button></a></td></tr><?php
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