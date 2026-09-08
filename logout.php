<?php

session_start();


// Remove Remember Me Cookie

if(isset($_COOKIE['user_email']))
{

    setcookie(
        "user_email",
        "",
        time() - 3600,
        "/"
    );

}



// Destroy Session

session_unset();

session_destroy();



header("Location: login.php");

exit();

?>