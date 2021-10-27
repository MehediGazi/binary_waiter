<?php


	if( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['caddr']) && isset($_POST['cnum']) && isset($_POST['carea']) && !empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["caddr"]) && !empty($_POST["cnum"]) && !empty($_POST["carea"]) ){

		session_start();
		$cid = $_SESSION['cid'];
		$fn = $_POST["fname"];
		$ln = $_POST["lname"];
		$caddr = $_POST["caddr"];
		$cnum = $_POST["cnum"];
		$carea = $_POST["carea"];

		if($_SESSION['cimg'] == "files/default.jpg"){
        	$imgurl = "files/default.jpg";
        }else{
        	$imgurl = "files/$cid$fn.jpg";
        }

		if(isset($_FILES['cimg']) && !empty($_FILES['cimg'])){
            $cimg=$_FILES['cimg'];
            move_uploaded_file($cimg['tmp_name'],"files/$cid$fn.jpg");
            $imgurl = "files/$cid$fn.jpg";
        }

        echo $_SESSION['cimg'] . ' ' . $imgurl;


		try {

			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$quary = "UPDATE Customers SET fname = '$fn', lname = '$ln', caddr = '$caddr', cnum = '$cnum', carea = '$carea', cimg = '$imgurl' WHERE cid = $cid;";

			try {
				
				$dbcon->exec($quary);

				?>
					<script>window.location.assign('cus_home.php')</script>
				<?php

				
			} catch (PDOExpection $ex) {
				?>
					<script>window.location.assign('cus_home.php')</script>
				<?php
			}
			
		} catch (PDOExpection $ex) {
			?>
					<script>window.location.assign('res_find.php')</script>
			<?php
		}
	}else{
			?>
				<script>window.location.assign('res_list.php')</script>
			<?php
	}
?>

