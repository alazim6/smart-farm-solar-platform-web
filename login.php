<?php

session_start();

include "config/database.php";

// Auto Login using Cookie

if(!isset($_SESSION['user_id']) && isset($_COOKIE['user_email']))
{

    $email = $_COOKIE['user_email'];


    $sql = "SELECT * FROM users WHERE email='$email'";


    $result = mysqli_query($conn,$sql);


    if(mysqli_num_rows($result)>0)
    {

        $user = mysqli_fetch_assoc($result);


        $_SESSION['user_id'] = $user['id'];

        $_SESSION['user_name'] = $user['name'];

        $_SESSION['role'] = $user['role'];



        if($user['role']=="Farm Owner")
        {
            header("Location: farm-owner.php");
            exit();
        }


        elseif($user['role']=="Government Authority")
        {
            header("Location: government.php");
            exit();
        }


        elseif($user['role']=="Energy Grid Operator")
        {
                header("Location: grid-operator-dashboard.php");

            exit();
        }


    }

}

if(isset($_POST['login']))
{

    $email = $_POST['email'];

    $password = $_POST['password'];

    $role = $_POST['role'];



    $sql = "SELECT * FROM users 
            WHERE email='$email' 
            AND password='$password'
            AND role='$role'";


    $result = mysqli_query($conn,$sql);



    if(mysqli_num_rows($result)>0)
    {


        $user = mysqli_fetch_assoc($result);



        // SESSION CREATE

        $_SESSION['user_id'] = $user['id'];

        $_SESSION['user_name'] = $user['name'];

        $_SESSION['role'] = $user['role'];





        // ==========================
        // REMEMBER ME COOKIE
        // ==========================


        if(isset($_POST['remember']))
        {


            setcookie(
                "user_email",
                $user['email'],
                time() + (86400 * 30),
                "/"
            );


        }
        else
        {


            if(isset($_COOKIE['user_email']))
            {


                setcookie(
                    "user_email",
                    "",
                    time() - 3600,
                    "/"
                );


            }


        }







        // ROLE REDIRECT


        if($user['role']=="Farm Owner")
        {


            header("Location: farm-owner.php");


        }


        elseif($user['role']=="Government Authority")
        {


            header("Location: government.php");


        }


        elseif($user['role']=="Energy Grid Operator")
        {


                header("Location: grid-operator-dashboard.php");



        }



        exit();



    }

    else
    {


        echo "Invalid Login Information";


    }


}

?>





<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Login | Smart Farm Solar Platform</title>


<link rel="stylesheet" href="/smart-farm-solar-platform-web/assets/css/login.css">


</head>


<body>


<div class="auth-container">



<div class="auth-left">

</div>





<div class="auth-right">



<form method="POST" action="">



<div class="auth-box">



<h1 class="auth-title">

Login

</h1>






<div class="input-group">


<label>

Email Address

</label>



<input 
type="email" 
name="email" 
placeholder="Enter your Email"
value="<?php echo $_COOKIE['user_email'] ?? ''; ?>"
required>


</div>







<div class="input-group">


<label>

Password

</label>



<input 
type="password" 
name="password" 
placeholder="Enter your Password"
required>



</div>







<div class="input-group">


<label>

Select Role

</label>



<select name="role">


<option>

Select your role

</option>


<option>

Farm Owner

</option>


<option>

Energy Grid Operator

</option>


<option>

Government Authority

</option>



</select>


</div>









<div style="font-size:12px; margin-top:5px;">



<label>


<input 
type="checkbox"
name="remember"
value="1">


Remember Me


</label>





<span style="float:right;">


<a href="forgot-password.php">

Forgot Password?

</a>


</span>



</div>









<button name="login" class="main-btn">


Log In →


</button>








<div class="auth-link">


<a href="register.php">

Create an Account

</a>


</div>






</div>




</form>




</div>


</div>





<script src="/smart-farm-solar-platform-web/assets/js/login-validation.js"></script>


</body>


</html>