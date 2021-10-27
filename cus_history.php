<style>
	#info{
		font-weight: bold;
		font-size: 130%;
        font-family: montserrat;
        color: black;
        text-align: center;
        border: 2px solid black;
        border-spacing: 2px;
	}

	#info2{
		color: green;
	}
	body{
            background-image: url('images/bg13.jpg');
            background-size: cover;
        }
</style>

<h1 style="font-family: montserrat; color: #FFA600;">Your Food Cosumption History:</h1>

<?php
	
	session_start();
	$cid = $_SESSION['cid'];

	cus_history(7,'DAY','Week', $cid);
	cus_history(30,'DAY','Month', $cid);
	cus_history(1,'YEAR','YEAR', $cid);

	function cus_history($tp, $tn, $ptn, $cid){

		$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM OrderDetails WHERE date(otime) BETWEEN DATE(DATE_SUB(now(), INTERVAL $tp $tn)) and DATE(now()) and cid = '$cid'";

		try {
			$qval = $dbcon->query($sql);
			$info = $qval->fetchAll();
			$cus_count = 0;
			$cus_cons = 0;
			foreach ($info as $row) {
				$cus_count++;
				$cus_cons = $cus_cons + $row['bill'] + $row['vat'];
			}

			?>
		<dev id='info'>
			Last <?php echo $ptn?>'s Consumption: <span id="info2"><?php echo $cus_cons ?> Taka </span><br>
			Last <?php echo $ptn?>'s Orders Placed: <span id="info2"><?php echo $cus_count ?></span> <br><br>
		</dev>
			<?php
		} catch (Exception $e) {
			
		}
	}

	$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT * from OrderDetails where cid = '$cid'";

	try {
		$qval = $dbcon->query($sql);
		$info = $qval->fetchAll();
		$total_count = 0;
		$total_cons = 0;
		foreach ($info as $row) {
			$total_count++;
			$total_cons = $total_cons + $row['bill'] + $row['vat'];
		}

		?>
		<span id="info">Total Consumption: <span id="info2"><?php echo $total_cons ?> Taka <br></span>
		Total Orders Placed: <span id="info2"><?php echo $total_count ?> &nbsp</span>
		<br><br><br><button onclick="back()">Back</button>
		<?php
	} catch (Exception $e) {
		
	}

?>

<script>
	function back(){
		window.history.back();
	}
</script>