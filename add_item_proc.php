<?php

	if(isset($_GET['iname']) && isset($_GET['price']) && isset($_GET['cat']) && !empty($_GET['iname']) && !empty($_GET['price']) && !empty($_GET['cat'])){

        session_start();
        $rid = $_SESSION['rid'];
        $iname = $_GET['iname'];
        $price = $_GET['price'];
        $cat = $_GET['cat'];

		try {
			
			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $quary = "INSERT INTO Menu(rid, iname, price, cat) VALUES($rid,'$iname', $price, '$cat')";

            try {
            	$dbcon->exec($quary);
            	?>
            		<script>
            			window.alert("Item has been added.");
            			window.location.assign("menu.php");
            		</script>
            	<?php

            } catch (PDOException $ex) {
            	?>
            		<script>
            			window.location.assign("cus_login.php");
            		</script>
            	<?php
            }

            
		} catch (PDOException $ex) {
			?>
           		<script>
           			window.location.assign("res_login.php");
           		</script>
            <?php
		}
	}else{
        ?>
        <script>
            window.location.assign("add_item.php");
        </script>
    <?php
    }
?>