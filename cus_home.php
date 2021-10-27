<head>
    <link href="/usr/local/includ/Users/santo/projects/bootstrap-5.0.0-beta2-dist/csse">
</head>

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

    body{
            background-image: url('images/bg9.jpeg');
            background-size: cover;
        }
</style>

<?php
	session_start();
	if(isset($_SESSION['cmail']) && !empty($_SESSION['cmail'])){
		try{
			$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
        	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$cmail = $_SESSION['cmail'];
			$query="SELECT * FROM Customers WHERE cmail='$cmail'";

            try{
                $returnval=$dbcon->query($query);
                $info = $returnval->fetchAll();
                foreach ($info as $row) {
                    $cid = $row['cid'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $_SESSION['carea'] = $row['carea'];
                    $_SESSION['cnum'] = $row['cnum'];
                    $_SESSION['caddr'] = $row['caddr'];
                    $_SESSION['cimg'] = $row['cimg'];
                }
                $_SESSION['cid'] = $cid;

            }catch(PDOException $ex){

            }
    	}catch(PDOException $ex){

    	}
		?>

		<h1>Welcome To Customer's HomePage!</h1>

		<p id='info' style="text-align: center;">Name: <?php echo $_SESSION['fname']; ?>
		<?php echo $_SESSION['lname']; ?><br>
        Area: <?php echo $_SESSION['carea']; ?><br>
        Email: <?php echo $_SESSION['cmail']; ?><br>
        Number: <?php echo $_SESSION['cnum']; ?><br>
    	</p>

    <div style="text-align: center; font-family: montserrat;">
		<input type="button" value="All Restaurants" onclick="res_list()"" style="font-size: 150%;font-family: montserrat;" class="btn btn-outline-primary"><br><br>
		<input type="button" value="Find a restaurant" id="find" onclick="res_find()" style="font-size: 150%; font-family: montserrat;"><br><br>
		<input type="button" value="Place an order" id="order" style="font-size: 150%; font-family: montserrat;" onclick="res_list()"><br><br>
		<input type="button" value="Your Orders" onclick="your_orders()" style="font-size: 150%; font-family: montserrat;"><br><br>
        <button onclick="history()" style="font-size: 130%; font-family: montserrat;">History</button><br><br>
        <button onclick="profile()" style="font-size: 130%; font-family: montserrat;">Profile</button><br><br>
		<input type="button" value="Sign Out" id="signout">
    </div>

        <script>
            var elm=document.getElementById('signout');
            elm.addEventListener('click', processlogout);
            
            function processlogout(){

                window.location.assign('cus_logout.php');
        
            }

            function res_list(){
            	window.location.assign('res_list.php');
            }

            function res_find(){
            	window.location.assign('res_find.php');
            }

            function your_orders(){
            	window.location.assign("cus_orders.php");
            }

            function profile(){
                window.location.assign("cus_profile.php")
            }

            function history(){
                window.location.assign("cus_history.php")
            }
        </script>
		<?php
	}else{
		?>
            <script>
                window.location.assign('cus_login.php');
            </script>
        <?php
	}
?>