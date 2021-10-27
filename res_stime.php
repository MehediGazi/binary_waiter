<?php
try {
	$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$time = $_GET['t'];
	$oid = $_GET['oid'];

	$query = "UPDATE OrderDetails SET stime = 	DATE_ADD(now(), INTERVAL $time MINUTE) WHERE oid = $oid";
	try {
		$dbcon->exec($query);

		$quary = '';
		?>
		<script>
			window.location.assign("res_orders.php");
		</script>
		<?php
	} catch (Exception $e) {
		?>
		<script>
			window.location.assign("res_home.php");
		</script>
		<?php
	}

} catch (Exception $e) {
	
}
?>