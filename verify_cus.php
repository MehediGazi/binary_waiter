<?php
    
    if(isset($_POST['cmail']) && isset($_POST['cpass']) 
       && !empty($_POST['cmail']) && !empty($_POST['cpass'])){
        
        $cmail=$_POST['cmail'];
        $cpass=md5($_POST['cpass']);
        
        try{

            $dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query="SELECT cmail FROM Customers WHERE cmail='$cmail' and cpass='$cpass'";
            
            try{
                $returnval=$dbcon->query($query);
                if($returnval->rowCount()==1){

                    session_start();
                    
                    $_SESSION['cmail']=$cmail;
                    ?>
                        <script>
                            window.location.assign('cus_home.php');
                        </script>
                    <?php
                }
                else{

                    ?>
                        <script>
                            window.location.assign('cus_login.php');
                            window.alert("Wrong Login Information. Try Again");
                        </script>
                    <?php
                }
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('cus_login.php');
                    </script>
                <?php
            }
        }
        catch(PDOException $ex){
            ?>
                <script>
                    window.location.assign('cus_login.php');
                </script>
            <?php
        }
        
    }
    else{
        ?>
            <script>
                window.location.assign('cus_login.php');
            </script>
        <?php
    }
?>