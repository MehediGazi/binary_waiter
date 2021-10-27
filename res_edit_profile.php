<?php
	session_start();
	$rname = $_SESSION['rname'];
    $rarea = $_SESSION['rarea'];
    $rnum = $_SESSION['rnum'];
    $raddr = $_SESSION['raddr'];
    $vat = $_SESSION['vat'];
    $tabs = $_SESSION['tabs'];

?>

<style>
	body{
            background-image: url('images/bg11.jpg');
            background-size: cover;
        }
    p, h1{
    	font-family: montserrat;
    }
</style>

<body>
<h1>Edit your profile:</h1>
<form action="res_edit_profile_proc.php" method="POST" enctype="multipart/form-data">
	<p>
		<?php
		echo "Name:<br><input type='text' name='rname' value='$rname'> <br><br>";
		echo "Area: <br><input type='text' name='rarea' value='$rarea'><br><br>";
		echo "Address: <br><textarea name='raddr' rows='3' cols='40'>$raddr</textarea><br><br>";
		echo "Number: <br><input type='text' name='rnum' value='$rnum'><br><br>";
		echo "VAT and SC: <br><input type='text' name='vat' value='$vat'><br><br>";
		echo "Total Tables: <br><input type='text' name='tabs' value='$tabs'><br><br>";
		
		?>
		Profile Picture:<br><input type="file" name="rimg" id="rimg">
		<p style=' font-size: 150%; color: red;'><input type='submit' value='Update'></p>
	
	</p>
</form>

<button onclick="back()">Back</button>
</body>

<script>
	function back(){
			window.location.assign('cus_profile.php')
		}
</script>
