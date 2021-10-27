<?php


	if( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['cmail']) && isset($_POST['cpass']) && isset($_POST['cadd']) && isset($_POST['cnum']) && isset($_POST['carea']) && !empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["cmail"]) && !empty($_POST["cpass"]) && !empty($_POST["cadd"]) && !empty($_POST["cnum"]) && !empty($_POST["carea"]) ){

		$fn = $_POST["fname"];
		$ln = $_POST["lname"];
		$cmail = $_POST["cmail"];
		$cpass = md5($_POST["cpass"]);
		$cadd = $_POST["cadd"];
		$cnum = $_POST["cnum"];
		$carea = $_POST["carea"];

		try {

			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$quary = "INSERT INTO Customers(fname, lname, cmail, caddr, cnum, carea, cpass) VALUES('$fn','$ln','$cmail','$cadd','$cnum','$carea','$cpass')	";
			echo $quary;

			try {
				
				$dbcon->exec($quary);

				?>
					<script>window.location.assign('cus_login.php')</script>
				<?php
			} catch (PDOExpection $ex) {
				?>
					<script>window.location.assign('cus_sign_up.php')</script>
				<?php
			}
			
		} catch (PDOExpection $ex) {
			?>
					<script>window.location.assign('cus_sign_up.php')</script>
			<?php
		}
	}else{
			?>
				<script>window.location.assign('cus_sign_up.php')</script>
			<?php
	}
?>

