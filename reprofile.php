<?php
session_start();

       ////////////////////post message and redirect//////////////////
        $url1 = "profile.php?user=".$_GET['user'];
        $_SESSION['user'] = $_GET['user'];
        header('Location: ' . $url1);
        ?>
