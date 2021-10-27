<?php

	if(isset($_GET['x']) && !empty($_GET['x'])){

		$x = $_GET['x'];

		try {
			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
        	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        	$query = "SELECT * FROM Restaurants WHERE rname LIKE '%$x%'";
                session_start();
        	
        	try {
        		$qval = $dbcon->query($query);
        		$info = $qval->fetchAll();

        		if($qval->rowCount() >= 1){
        			foreach ($info as $row) {
        				$rid = $row['rid'];
                                        $_SESSION['rname'] = $row['rname'];
                                        $_SESSION['rid'] = $row['rid'];
        			}
        			?>
        			<script>
        				window.location.assign("res_find_result.php?rid=<?php echo $rid ?>&flag=1");
        			</script>
        			<?php
        		}else{
        			?>
        			<script>
        				window.location.assign("res_find_result.php?flag=0");
        			</script>
        			<?php
        		}
        	} catch (PDOException $ex) {
        		?>
        			<script>
        				window.location.assign("res_list.php");
        			</script>
        			<?php
        	}


		} catch (PDOException $ex) {
			
		}
	}

?>
