<style>
	h2, ol, li{
		font-family: montserrat;
	}

	body{
            background-image: url('images/bg10.jpg');
            background-size: cover;
        }
</style>

<?php
	try {
		$dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query1 = "SELECT * FROM Restaurants";
		try {
			$qvalue = $dbcon->query($query1);
			$info = $qvalue->fetchAll();
			
			?>	
			<h2>Here are the restaurants:</h3>
			<ol style="font-weight: bold;">
			<?php
			foreach($info as $row){
				?>
				<a href="res_profile.php?rid=<?php echo $row['rid'] ?>"><li><?php echo $row['rname']?></li></a>
				<br>
				<?php
			}

			?>
			</ol>
			<input type="button" value="Home" onclick="home()"><br><br>
			<input type="button" value="Sign Out" id="signout">

			<script>
				function home(){
					window.location.assign('cus_home.php')
				}
				var elm=document.getElementById('signout');
                elm.addEventListener('click', processlogout);
                
                function processlogout(){

                    window.location.assign('cus_logout.php');
            
                }
			</script>

			<?php

			
		} catch (PDOException $ex) {
			?>
				Data Error
			<?php
		}
		
	} catch (PDOException $ex) {
		
	}
?>