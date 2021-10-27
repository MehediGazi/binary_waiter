<?php
	if(isset($_GET['x']) && !empty($_GET['x'])){
		
		$x = $_GET['x'];

		try {
			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "DELETE FROM Menu WHERE iid = '$x'";

            try{
            	$dbcon->exec($query);
            	?>
            		<script>
            			window.location.assign("delete_item.php");
            		</script>
            	<?php
            }catch (PDOException $ex) {
			
			}

		} catch (PDOException $ex) {
			
		}
	}
?>