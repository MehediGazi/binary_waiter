<?php
try {
	$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$oid = $_GET['oid'];

	$sql = "UPDATE OrderDetails SET paid = 1 where oid = $oid";
	try {
		$dbcon->exec($sql);
		?>
		<script>
			window.location.assign("res_payment.php");
		</script>
		<?php
	} catch (Exception $e) {
		
	}
} catch (Exception $e) {
	
}
?>