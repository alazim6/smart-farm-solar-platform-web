<!DOCTYPE html>
<html>

<head>

<title>Government Dashboard</title>

<link rel="stylesheet" href="/smart-farm-solar-platform-web/assets/css/government/government-dashboard.css">

</head>


<body>


<div class="dashboard-container">



<!-- Sidebar -->

<aside class="sidebar">


<a href="profile.php" class="profile">


<div>


<b>
<?php echo $_SESSION['user_name']; ?>
</b>

<br><br>
<small>
<?php echo $_SESSION['role']; ?>
</small>


</div>


</a>





<ul class="menu">


<li class="active">

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









<!-- MAIN CONTENT -->


<main class="main-content">



<h2>

DASHBOARD

</h2>








<!-- Summary Cards -->


<div class="summary-cards">



<div class="card">


<h4>

👥 Total Farms

</h4>



<h1>

<?= $total_farms; ?>

</h1>



<p>

Active: 2

</p>



</div>









<div class="card">


<h4>

⚡ Total Energy

</h4>



<h1>

<?= $total_energy; ?> kWh

</h1>



<p>

↑ 6.2% vs last month

</p>



</div>









<div class="card">


<h4>

🌐 National Grid Contribution

</h4>



<h1>

5%

</h1>



<p>

Solar contribution

</p>



</div>



</div>









<div class="dashboard-middle">







<!-- Farm Region -->


<div class="panel chart-panel">


<div class="panel-header">

<h4>
Farms by Region (By Capacity)
</h4>


<span>
View All
</span>


</div>





<div class="bar-chart">


<?php

if($region_query && mysqli_num_rows($region_query)>0)
{


while($region=mysqli_fetch_assoc($region_query))
{


$height=$region['capacity'] ?? 0;

?>


<div class="bar">


<span>

<?= $height; ?>

</span>



<div class="bar-fill"
style="height: <?= $height; ?>px;">
</div>



<small>

<?= htmlspecialchars($region['location']); ?>

</small>



</div>



<?php

}

}

?>


</div>



</div>









<!-- Top Farms -->


<div class="panel">



<div class="panel-header">


<h4>

Top Performing Farm

</h4>



<span>

View All

</span>



</div>






<table>


<tr>

<th>
Rank
</th>


<th>
Farm
</th>


<th>
Energy Supplied
</th>


<th>
Status
</th>


</tr>





<?php


$rank=1;


if($top_farm_query && mysqli_num_rows($top_farm_query)>0)
{


while($farm=mysqli_fetch_assoc($top_farm_query))

{


?>


<tr>


<td>

<?= $rank; ?>

</td>



<td>

<?= htmlspecialchars($farm['name']); ?>

</td>




<td>

<?= $farm['total_produced']; ?> kWh

</td>




<td>

Active

</td>



</tr>



<?php


$rank++;


}

}


?>





</table>




</div>









<!-- Notifications -->


<div class="panel notification-panel">



<div class="panel-header">


<h4>

Notifications

</h4>


</div>





<ol>


<?php


if($notification_query && mysqli_num_rows($notification_query)>0)
{


while($row=mysqli_fetch_assoc($notification_query))

{


?>


<li>

<?= htmlspecialchars($row['message']); ?>

</li>


<?php


}

}

else

{


?>


<li>

No notification available

</li>


<?php


}


?>




</ol>



</div>






</div>









<!-- Solar Contribution -->


<div class="energy-contribution">



<h3>

Solar Energy Contribution to National Grid

</h3>





<div class="energy-chart">


<div class="line-point">
Jan
</div>


<div class="line-point">
Feb
</div>


<div class="line-point">
Mar
</div>


<div class="line-point">
Apr
</div>


<div class="line-point">
May
</div>



</div>




</div>







</main>






</div>







</body>

</html>