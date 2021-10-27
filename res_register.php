<?php


	if( isset($_POST['rname']) && isset($_POST['rmail']) && isset($_POST['rpass']) && isset($_POST['radd']) && isset($_POST['rnum']) && isset($_POST['rarea']) && isset($_POST['vat']) && !empty($_POST["rname"]) && !empty($_POST["rmail"]) && !empty($_POST["rpass"]) && !empty($_POST["radd"]) && !empty($_POST["rnum"]) && !empty($_POST["rarea"]) && !empty($_POST["vat"]) ){

		session_start();
		$rn = $_POST["rname"];
		$rmail = $_POST["rmail"];
		$rpass = md5($_POST["rpass"]);
		$radd = $_POST["radd"];
		$rnum = $_POST["rnum"];
		$rarea = $_POST["rarea"];
		$vat = $_POST["vat"];
		$tabs = $_POST["tabs"];

		if(isset($_FILES['rimg']) && !empty($_FILES['rimg'])){
            $cimg=$_FILES['rimg'];
            move_uploaded_file($cimg['tmp_name'],"files/$rmail.jpg");
            $imgurl = "files/$rmail.jpg";
        }

		try {

			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$quary = "INSERT INTO Restaurants(rname, rmail, rpass, raddr, rarea, rnum, vat, tabs, rimg) VALUES('$rn','$rmail','$rpass','$radd','$rarea','$rnum',$vat, $tabs, '$imgurl')	";

			try {
				
				$dbcon->exec($quary);

				?>
					<script>window.location.assign('res_login.php')</script>
				<?php
			} catch (PDOExpection $ex) {
				?>
					<script>window.location.assign('res_sign_up.php')</script>
				<?php
			}
			
		} catch (PDOExpection $ex) {
			?>
					<script>window.location.assign('res_sign_up.php')</script>
			<?php
		}
	}else{
			?>
				<script>window.location.assign('res_sign_up.php')</script>
			<?php
	}
?>

