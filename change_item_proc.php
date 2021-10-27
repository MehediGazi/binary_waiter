<?php
	if(isset($_GET['check']) && !empty($_GET['check']) && isset($_GET['iid']) && !empty($_GET['iid'])){
		$iid = $_GET['iid'];
		try {
			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo $iid;

            $query = "DELETE FROM Menu WHERE iid = $iid";

            try{
            	$dbcon->exec($query);
            	?>
            	<script>
            		window.alert("Item has been deleted.");
    				window.location.assign("change_item.php");
    			</script>
            	<?php
            }catch (PDOException $ex) {
			
			}

		} catch (PDOException $ex) {
			?>
    		<script>
    			window.location.assign("menu.php");
    		</script>
    	<?php
		}
	}else if(isset($_GET['iname']) && isset($_GET['price']) && isset($_GET['cat']) && !empty($_GET['iname']) && !empty($_GET['price']) && !empty($_GET['cat'])){

		$iname = $_GET['iname'];
		$price = $_GET['price'];
		$cat = $_GET['cat'];
		$iid = $_GET['iid'];

		try {
			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "UPDATE Menu SET iname = '$iname', price = '$price', cat = '$cat' WHERE iid=$iid";

            try{
            	$dbcon->exec($query);
            	?>
            	<script>
            		window.alert("Item has been updated.");
    				window.location.assign("change_item.php");
    			</script>
            	<?php
            }catch (PDOException $ex) {
			
			}

		} catch (PDOException $ex) {
			?>
    		<script>
    			window.location.assign("menu.php");
    		</script>
    	<?php
		}
	}else{
		?>
    		<script>
    			window.location.assign("res_home.php");
    		</script>
    	<?php
	}
?>