<?php
	session_start();
	$fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $carea = $_SESSION['carea'];
    $cnum = $_SESSION['cnum'];
    $caddr = $_SESSION['caddr'];
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
<form action="cus_edit_profile_proc.php" method="POST" enctype="multipart/form-data">
	<p>
		<?php
		echo "First Name:<br><input type='text' name='fname' value='$fname'> <br><br>";
		echo "Last Name: <br><input type='text' name='lname' value='$lname'></input> <br><br>";
		echo "Address: <br><textarea name='caddr' rows='3' cols='40'>$caddr</textarea><br><br>";
		echo "Number: <br><input type='text' name='cnum' value='$cnum'><br><br>";
		echo "Area: <br><input type='text' name='carea' value='$carea'><br><br>";
		?>
		Profile Picture:<br><input type="file" name="cimg" id="cimg">
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
