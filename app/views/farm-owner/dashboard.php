<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>


<link rel="stylesheet" href="/smart-farm-solar-platform-web/assets/css/farm-owner/farm-owner-combined.css"></head>


<body>


<div class="app">



<!-- SIDEBAR -->

<div class="sidebar">


<a href="profile.php" class="profile">


<div>

<b>
<?php echo $_SESSION['user_name']; ?>
</b>


<small>
<?php echo $_SESSION['role']; ?>
</small>


</div>


</a>




<a href="farm-owner.php" class="menu active">

Dashboard

</a>



<a href="input-data.php" class="menu">

Input Data

</a>




<a href="manage-energy.php" class="menu">

Manage Energy

</a>




<a href="notification.php" class="menu">

Notification

</a>





<a href="logout.php" class="logout">

Logout

</a>



</div>









<!-- CONTENT -->


<div class="content">



<div class="top">


<div>

<h1>
Dashboard
</h1>


<p>
Overview of your daily energy system.
</p>


</div>



<input type="date" value="<?php echo date('Y-m-d'); ?>">



</div>









<div class="cards">



<div class="card">


<div class="circle">
⚡
</div>



<div>


<span>
Energy Produced
</span>



<h2>
<?php echo $produced; ?> kWh
</h2>



<small>
Today
</small>



</div>


</div>








<div class="card">


<div class="circle">
🔌
</div>



<div>


<span>
Energy Consumed
</span>



<h2>
<?php echo $consumed; ?> kWh
</h2>



<small>
Today
</small>



</div>


</div>








<div class="card">


<div class="circle">
🔋
</div>



<div>


<span>
Net Energy
</span>



<h2>
<?php echo $net; ?> kWh
</h2>



<small>
Surplus
</small>



</div>


</div>








<div class="card">


<div class="circle">
$
</div>



<div>


<span>
Estimated Savings
</span>



<h2>
৳ <?php echo $net * 12; ?>
</h2>



<small>
Today
</small>



</div>


</div>




</div>









<div class="dashboard-bottom">



<div class="box">


<h2>
Energy Overview (Today)
</h2>


<p class="unit">
kWh
</p>



<div class="simple-chart">


<div class="bar-area">


<div class="bar"
style="height:<?php echo min($produced,160); ?>px;">
</div>


<span>
Produced
</span>


</div>





<div class="bar-area">


<div class="bar"
style="height:<?php echo min($consumed,160); ?>px;">
</div>


<span>
Consumed
</span>


</div>



</div>


</div>








<div class="box">


<h2>
Recent Activity
</h2>



<div class="activity">


<?php

if(mysqli_num_rows($recent)>0){


while($row=mysqli_fetch_assoc($recent)){


$netValue=$row['produced']-$row['consumed'];

?>


<div class="activity-row">


<div class="check">
✓
</div>


<div>


<b>
Energy data submitted
</b>


<small>

<?php echo $row['date']; ?>

|

Produced:
<?php echo $row['produced']; ?> kWh

|

Consumed:
<?php echo $row['consumed']; ?> kWh

|

Net:
<?php echo $netValue; ?> kWh

</small>


</div>


</div>


<?php

}

}

else{

?>


<div class="activity-row">


<div class="check">
!
</div>


<div>

<b>
No energy data available
</b>


<small>
Submit data from Input Data page.
</small>


</div>


</div>


<?php

}

?>


</div>



</div>



</div>





</div>


</div>


</body>

</html>