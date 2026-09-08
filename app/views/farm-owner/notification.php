<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Notification - Farm Owner</title>


<link rel="stylesheet" href="/smart-farm-solar-platform-web/assets/css/farm-owner/farm-owner-combined.css">

</head>


<body>



<div class="dashboard-container">



<!-- Sidebar -->

<aside class="sidebar">


<div class="profile">

<div>

<b>
<?php 
echo isset($_SESSION['user_name']) 
? $_SESSION['user_name'] 
: "User";
?>
</b>


<small>
<?php 
echo isset($_SESSION['role']) 
? $_SESSION['role'] 
: "Farm Owner";
?>
</small>


</div>

</div>





<a href="/smart-farm-solar-platform-web/farm-owner.php" class="menu-item">

Dashboard

</a>




<a href="/smart-farm-solar-platform-web/input-data.php" class="menu-item">

Input Data

</a>





<a href="/smart-farm-solar-platform-web/manage-energy.php" class="menu-item">

Manage Energy

</a>





<a href="/smart-farm-solar-platform-web/notification.php" class="menu-item active">

Notification

</a>





<a href="/smart-farm-solar-platform-web/logout.php" class="logout">

Logout

</a>



</aside>









<!-- Main -->

<main class="main-content">


<h1>
Notifications
</h1>


<p class="subtitle">

Latest updates and alerts from your solar farm.

</p>








<div class="notification-box">



<?php


if(mysqli_num_rows($notifications) > 0)

{


while($row = mysqli_fetch_assoc($notifications))

{


?>


<div class="notification-item">


<div class="dot"></div>



<div>


<h3>

Energy Update

</h3>


<p>

<?php echo $row['message']; ?>

</p>



<span>

<?php echo $row['created_at'] ?? "Today"; ?>

</span>



</div>


</div>



<?php


}


}

else

{


?>


<div class="notification-item">


<div class="dot warning"></div>


<div>


<h3>

No Notifications

</h3>


<p>

There are no new updates available.

</p>


<span>

-

</span>


</div>


</div>



<?php

}

?>





</div>







</main>






</div>





</body>

</html>