<?php
	try {
		$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $oid = $_GET['oid'];
	    $query = "UPDATE OrderDetails SET stat = 1 WHERE oid = $oid";

	    try {
	    	$dbcon->exec($query);
	    	?>
			<script>
				window.location.assign("res_orders.php");
			</script>
			<?php
	    } catch (Exception $e) {
	    	
	    }
	} catch (Exception $e) {
		
	}
?>