<?php
session_start();
//////////////////////change session and redirect////////////////////
        $url1 = "Home.php";
        $_SESSION['user'] = $_GET['user'];
        header('Location: ' . $url1);
        
        ?>


