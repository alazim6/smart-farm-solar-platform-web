<?php


session_start();



if(
    !isset($_SESSION['user_name']) ||
    !isset($_SESSION['role'])
)
{


    header("Location: /smart-farm-solar-platform-web/login.php");

    exit();


}



?>