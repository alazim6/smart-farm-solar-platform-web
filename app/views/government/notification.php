<!DOCTYPE html>
<html>


<head>


<title>Notification</title>


<link rel="stylesheet" href="/smart-farm-solar-platform-web/assets/css/government/government-dashboard.css">


</head>




<body>




<div class="dashboard-container">







<!-- Sidebar -->


<aside class="sidebar">





<div class="profile">


<div class="avatar">

<?php

echo strtoupper(substr($_SESSION['user_name'],0,9));

?>

</div>



<p>
<?php echo htmlspecialchars($_SESSION['role']); ?>
</p>




</div>









<ul class="menu">





<li>


<a href="/smart-farm-solar-platform-web/government.php">

🏠 Dashboard

</a>


</li>









<li>


<a href="/smart-farm-solar-platform-web/total-grid.php">

▦ Total Grid

</a>


</li>









<li>


<a href="/smart-farm-solar-platform-web/energy-analysis.php">

📊 Energy Analysis

</a>


</li>









<li class="active">


<a href="/smart-farm-solar-platform-web/government-notification.php">

🔔 Notification

</a>


</li>








</ul>









<div class="logout">


<a href="/smart-farm-solar-platform-web/logout.php">


🚪 Logout


</a>


</div>









</aside>















<!-- Main Content -->



<main class="main-content">





<h2>

NOTIFICATION

</h2>









<div class="notification-container">







<?php



if(isset($query) && mysqli_num_rows($query) > 0)

{





while($row = mysqli_fetch_assoc($query))

{



?>







<div class="notification-card info">







<div class="notification-title">


🔔 Notification


</div>







<p>


<?php echo htmlspecialchars($row['message']); ?>


</p>








<span>


<?php echo htmlspecialchars($row['created_at']); ?>


</span>








</div>







<?php



}



}

else

{



?>







<div class="notification-card info">






<div class="notification-title">


🔔 No Notification


</div>







<p>


No notifications available.


</p>







<span>


-


</span>







</div>








<?php



}



?>







</div>







</main>







</div>







</body>


</html>