<?php

session_start();

require_once "config/database.php";


// login check

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");
    exit();

}



$user_id = $_SESSION['user_id'];



// get current user data

$result = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE id='$user_id'"
);


$user = mysqli_fetch_assoc($result);





// UPDATE PROFILE

if(isset($_POST['update'])){


    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $phone = mysqli_real_escape_string($conn, $_POST['phone']);



    $sql = "
    UPDATE users 
    SET 
    name='$name',
    phone='$phone'
    WHERE id='$user_id'
    ";



    $result = mysqli_query($conn,$sql);



    if(!$result){

        die("Update Error: " . mysqli_error($conn));

    }



    $_SESSION['user_name'] = $name;



    header("Location: profile.php");

    exit();




    // session update

    $_SESSION['user_name']=$name;



    header("Location: profile.php");

    exit();

}





// DELETE ACCOUNT

if(isset($_POST['delete'])){


    mysqli_query(
        $conn,
        "DELETE FROM users WHERE id='$user_id'"
    );



    session_destroy();


    header("Location: login.php");

    exit();

}



?>



<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Profile Settings</title>


<style>


body{

    background:#f5f1e8;
    font-family:Georgia,serif;

}



.container{

    width:450px;

    margin:80px auto;

    background:white;

    padding:30px;

    border-radius:12px;

}



h2{

    text-align:center;

    color:#083d2b;

}



label{

    display:block;

    margin-top:15px;

}



input{

    width:100%;

    padding:12px;

    margin-top:5px;

    border:1px solid #ccc;

    border-radius:6px;

}



button{

    width:100%;

    padding:12px;

    margin-top:20px;

    border:none;

    border-radius:6px;

    cursor:pointer;

}



.update{

    background:#083d2b;

    color:white;

}



.delete{

    background:#b00020;

    color:white;

}



.role{

    text-align:center;

    color:#777;

    margin-bottom:20px;

}


.back{

    display:block;

    text-align:center;

    margin-top:20px;

    color:#083d2b;

}



</style>


</head>



<body>


<div class="container">


<h2>
Profile Settings
</h2>


<div class="role">

<?php echo $user['role']; ?>

</div>




<form method="POST">


<label>
Name
</label>


<input 
type="text"
name="name"
value="<?php echo $user['name']; ?>"
required
>



<label>
Mobile Number
</label>


<input 
type="text"
name="phone"
value="<?php echo $user['phone']; ?>"
required
>




<button 
type="submit"
name="update"
class="update">

Update Profile

</button>



</form>




<form method="POST">


<button 
type="submit"
name="delete"
class="delete"
onclick="return confirm('Are you sure you want to delete your account?')">

Delete Account

</button>


</form>



<a class="back" href="javascript:history.back()">

← Back

</a>



</div>


</body>

</html>