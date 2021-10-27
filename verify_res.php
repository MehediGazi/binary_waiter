<?php
    
    if(isset($_POST['rmail']) && isset($_POST['rpass']) 
       && !empty($_POST['rmail']) && !empty($_POST['rpass'])){
        
        $rmail=$_POST['rmail'];
        $rpass=md5($_POST['rpass']);
        
        try{

            $dbcon = new PDO("mysql:host=localhost:3306;dbname=bwdb;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query="SELECT rmail FROM Restaurants WHERE rmail='$rmail' and rpass='$rpass'";
            
            try{
                $returnval=$dbcon->query($query);
                if($returnval->rowCount()==1){

                    session_start();
                    
                    $_SESSION['rmail']=$rmail;

                    ?>
                        <script>
                            window.location.assign('res_home.php');
                        </script>
                    <?php
                }
                else{

                    ?>
                        <script>
                            window.alert("Wrong Login Information. Try Again")
                            window.location.assign('res_login.php');
                        </script>
                    <?php
                }
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('res_login.php');
                    </script>
                <?php
            }
        }
        catch(PDOException $ex){
            ?>
                <script>
                    window.location.assign('res_login.php');
                </script>
            <?php
        }
        
    }
    else{
        ?>
            <script>
                window.location.assign('res_login.php');
            </script>
        <?php
    }
?>