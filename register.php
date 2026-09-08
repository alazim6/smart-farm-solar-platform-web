<?php

include "config/database.php";


$message = "";


if(isset($_POST['register']))
    
    {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $organization = $_POST['organization'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users
    (name,email,password,phone,location,organization,role)
    VALUES
    (
    '$name', '$email','$password','$phone','$location','$organization','$role'
    )";



    if(mysqli_query($conn,$sql))
    {


        // Get newly created user id

        $new_user_id = mysqli_insert_id($conn);



        // Send notification to Government Authority
        // Find government user


        $gov_query = mysqli_query($conn,

        "SELECT id FROM users 
        WHERE role='Government Authority'
        LIMIT 1"

        );


        if(mysqli_num_rows($gov_query) > 0)
        {


            $gov = mysqli_fetch_assoc($gov_query);


            $gov_id = $gov['id'];



            $notification_sql = "INSERT INTO notifications

            (user_id,message,status)

            VALUES

            (
            '$gov_id',
            'New Farm Owner registered in the system.',
            'unread'
            )";



            mysqli_query($conn,$notification_sql);



        }



        $message = "Account created successfully!";


        }

    else
    {


        $message = "Error: " . mysqli_error($conn);


    }


}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Join Solar Network</title>


<link rel="stylesheet" href="/smart-farm-solar-platform-web/assets/css/style.css">

<link rel="stylesheet" href="/smart-farm-solar-platform-web/assets/css/register.css">


</head>



<body>



<div class="register-container">



    <!-- Left Green Panel -->

    <div class="register-left">

    </div>





    <!-- Register Area -->

    <div class="register-right">



        <div class="register-box">



            <h1 class="register-title">
                Join the solar network

                </h1>
                
                <?php

                if($message!="")
                    {

                echo "<p>".$message."</p>";

                    }

                ?>  
            



            <p class="register-subtitle">
                Create an account to join
            </p>





            <form method="POST" action="">



                <div class="two-column">



                    <div class="input-group">

                        <label>
                            Full Name
                        </label>

                        <input 
                        type="text"
                        name="name"
                        placeholder="Enter your Full name">

                    </div>





                    <div class="input-group">

                        <label>
                            Email Address
                        </label>

                        <input 
                        type="email"
                        name="email"
                        placeholder="Enter your Email">

                    </div>





                    <div class="input-group">

                        <label>
                            Phone Number
                        </label>

                        <input 
                        type="text"
                        name="phone"
                        placeholder="Enter your phone number">

                    </div>





                    <div class="input-group">

                        <label>
                            Location
                        </label>

                        <input 
                        type="text"
                        name="location"
                        placeholder="Enter your location">

                    </div>





                    <div class="input-group full-width">

                        <label>
                            Organization / Farm name / Department
                        </label>

                        <input 
                        type="text"
                        name="organization"
                        placeholder="Enter organization name">

                    </div>





                    <div class="input-group">

                        <label>
                            Password
                        </label>

                        <input 
                        type="password"
                        name="password"
                        placeholder="Create a password">

                    </div>





                    <div class="input-group">

                        <label>
                            Confirm Password
                        </label>

                        <input 
                        type="password"
                        name="confirm_password"
                        placeholder="Confirm password">

                    </div>





                    <div class="input-group full-width">


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



                </div>





                <button name="register" class="main-btn">
                               Create Account →

                </button>






                <div class="auth-link">

                    Already have an account?

                    <a href="login.php">
                        Sign in
                    </a>


                </div>




            </form>




        </div>




    </div>




</div>




</body>


</html>

<script src="/smart-farm-solar-platform-web/assets/js/register-validation.js"></script>