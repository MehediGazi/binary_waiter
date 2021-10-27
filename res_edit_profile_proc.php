<?php


	if( isset($_POST['rname']) && isset($_POST['rarea']) && isset($_POST['raddr']) && isset($_POST['rnum']) && isset($_POST['vat']) && isset($_POST['tabs']) && !empty($_POST["rname"]) && !empty($_POST["rarea"]) && !empty($_POST["raddr"]) && !empty($_POST["rnum"]) && !empty($_POST["vat"]) && !empty($_POST["tabs"]) ){

		session_start();
		$rid = $_SESSION['rid'];
		$rmail = $_SESSION['rmail'];
		$rn = $_POST["rname"];
		$raddr = $_POST["raddr"];
		$rarea = $_POST["rarea"];
		$rnum = $_POST["rnum"];
		$vat = $_POST["vat"];
		$tabs = $_POST["tabs"];

		if(isset($_FILES['rimg']) && !empty($_FILES['rimg'])){
            $rimg=$_FILES['rimg'];
            move_uploaded_file($rimg['tmp_name'],"files/$rmail.jpg");
            $imgurl = "files/$rmail.jpg";
        }


		try {

			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$quary = "UPDATE Restaurants SET rname = '$rn', raddr = '$raddr', rnum = '$rnum', rarea = '$rarea', vat = '$vat', tabs = '$tabs', rimg = '$imgurl' WHERE rid = $rid";

			try {
				
				$dbcon->exec($quary);

				?>
					<script>window.location.assign('res_home.php')</script>
				<?php

				
			} catch (PDOExpection $ex) {
				?>
					<script>window.location.assign('res_home.php')</script>
				<?php
			}
			
		} catch (PDOExpection $ex) {
			?>
					<script>window.location.assign('res_home.php')</script>
			<?php
		}
	}else{
			?>
				<script>window.location.assign('res_list.php')</script>
			<?php
	}
?>

