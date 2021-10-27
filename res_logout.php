<?php

    session_start();

    unset($_SESSION['rmail']);
    session_destroy();

    echo "<script>window.location.assign('res_login.php');</script>";
?>