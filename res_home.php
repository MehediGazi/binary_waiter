<style>
    #info{
        font-weight: bold;
        font-family: montserrat;
        font-size: 150%;
        color: black;
    }

    #div1{
        text-align: center;
        font-family: montserrat;
        color: orange;  
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
            background-image: url('images/bg4.jpeg');
            background-size: cover;
        }
</style>


<body>
<?php
	session_start();
	if(isset($_SESSION['rmail']) && !empty($_SESSION['rmail'])){

        $rmail = $_SESSION['rmail'];
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query="SELECT * FROM Restaurants WHERE rmail='$rmail'";

            try{
                $returnval=$dbcon->query($query);
                $info = $returnval->fetchAll();
                foreach ($info as $row) {
                    $rid = $row['rid'];
                    $_SESSION['rname'] = $row['rname'];
                    $_SESSION['rarea'] = $row['rarea'];
                    $_SESSION['rnum'] = $row['rnum'];
                    $_SESSION['raddr'] = $row['raddr'];
                    $_SESSION['vat'] = $row['vat'];
                    $_SESSION['tabs'] = $row['tabs'];
                    $rimg = $row['rimg'];
                }
                $_SESSION['rid'] = $rid;

            }catch(PDOException $ex){

            }

		?>   
        <div id="div1">
			<h1 style="font-size: 2.5em; background-color: white;men">Welcome To Restaurant's HomePage!</h1>

            <img src="<?php echo $rimg?>" alt='Avatar' id='image'>

            <div id='info'>
            Name: <?php echo $_SESSION['rname']; ?><br>
            Area: <?php echo $_SESSION['rarea']; ?><br>
            Email: <?php echo $_SESSION['rmail']; ?><br>
            Number: <?php echo $_SESSION['rnum']; ?><br><br>
            </div>

            <button type="button" onclick="menu()">Your Menu</button><br><br>

            <button onclick="orders()">Orders</button>
            <button onclick="payment()">Payments</button><br><br>
            <button onclick="edit()">Edit Profile</button><br><br>

			<input type="button" value="Sign Out" id="signout">

        </div>

            <script>
                var elm=document.getElementById('signout');
                elm.addEventListener('click', processlogout);
                
                function processlogout(){

                    window.location.assign('res_logout.php');
            
                }

                function menu(){
                    window.location.assign("menu.php");
                }

                function orders(){
                    window.location.assign("res_orders.php")
                }

                function payment(){
                    window.location.assign("res_payment.php")
                }

                function edit(){
                    window.location.assign("res_edit_profile.php")
                }

            </script>
            
		<?php
	}else{
		?>
            <script>
                window.location.assign('res_login.php');
            </script>
        <?php
	}
?>

</body>