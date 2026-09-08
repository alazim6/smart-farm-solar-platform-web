<!DOCTYPE html>
<html>

<head>

<title>Total Grid</title>


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





<li class="active">

<a href="/smart-farm-solar-platform-web/total-grid.php">

▦ Total Grid

</a>

</li>





<li>

<a href="/smart-farm-solar-platform-web/energy-analysis.php">

📊 Energy Analysis

</a>

</li>





<li>

<a href="/smart-farm-solar-platform-web/g.notification.php">

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

TOTAL GRID

</h2>









<!-- Top Cards -->


<div class="summary-cards">





<div class="card">


<h4>

Total Grid Capacity

</h4>



<h1>

<?php echo $total_capacity; ?> kW

</h1>



</div>









<div class="card">


<h4>

⚡ Energy in Grid (Today)

</h4>



<h1>

<?php echo $today_energy; ?> kW

</h1>



</div>









<div class="card">


<h4>

🌐 Grid Efficiency

</h4>



<h1>

<?php echo $grid_efficiency; ?>%

</h1>



</div>





</div>









<!-- Grid Section -->


<div class="grid-section">







<div class="grid-load">





<div class="circle">


<?php echo $grid_load; ?>%


<br>


<span>

grid load

</span>


</div>







<p>

Grid Status :

<?php echo htmlspecialchars($grid_status); ?>


</p>







</div>









<div class="grid-card">



<h2>

Grid is <?php echo strtolower($grid_status); ?>

</h2>





<p>

<?php echo htmlspecialchars($grid_message); ?>

</p>






</div>









<div class="grid-card">



<h3>

Grid Status

</h3>





<p>

<?php echo htmlspecialchars($grid_status); ?>

</p>






</div>







</div>









</main>







</div>







</body>


</html>