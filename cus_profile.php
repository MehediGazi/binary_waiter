<style>
	h1{
		font-weight: bold;
		font-family: montserrat;
		text-align: center;
	}

	#info{
		font-weight: bold;
		font-size: 150%;
        font-family: montserrat;
        color: #FF6800;
	}

	#image{
		border-radius: 50%;
		vertical-align: middle;
		display: block;
	  	margin-left: auto;
	  	margin-right: auto;
	  	width: 200px;
	  	height: 200px;
	  	border: 3px solid black;
	  	padding: 5px;
	  	object-fit: cover;
	
	}

	#span{
		color: black;
	}

	body{
            background-image: url('images/bg9.jpeg');
            background-size: cover;
        }

</style>

<?php session_start();
	$cimg = $_SESSION['cimg'];
?>

<h1>Customer's Profile!</h1>


<img src="<?php echo $cimg?>" alt='Avatar' id='image'>

<p id='info' style="text-align: center;">Name: <?php echo $_SESSION['fname']; ?>
<?php echo " " . $_SESSION['lname']; ?><br>
Area: <?php echo $_SESSION['carea']; ?><br>
Email: <?php echo $_SESSION['cmail']; ?><br>
Number: <?php echo $_SESSION['cnum']; ?><br><br>

<?php
	$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$cid = $_SESSION['cid'];

	$sql = "SELECT * from OrderDetails where cid = '$cid'";

	try {
		$qval = $dbcon->query($sql);
		$info = $qval->fetchAll();
		$total_count = 0;
		$total_cons = 0;
		foreach ($info as $row) {
			$total_count++;
			$total_cons = $total_cons + $row['bill'] + $row['vat'];
		}

		?>
		<span id="span">Total Consumption: <?php echo $total_cons ?> Taka <br>
		Total Orders Placed: <?php echo $total_count ?> <br><br>
		<?php
	} catch (Exception $e) {
		
	}

?>

<button style="color: darkorange; font-size: 90%;" onclick="edit()">Edit Profile</button><br><br>
<button onclick="back()">Back</button>
</p>

<script>
	function edit(){
		window.location.assign("cus_edit_profile.php")
	}
	function back(){
			window.location.assign('cus_home.php')
		}
</script>