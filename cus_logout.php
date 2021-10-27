<?php

    session_start();

    unset($_SESSION['cmail']);
    session_destroy();

    echo "<script>window.location.assign('cus_login.php');</script>";
?>