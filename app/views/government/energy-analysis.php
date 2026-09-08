<!DOCTYPE html>
<html>

<head>

<title>Energy Analysis</title>


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





<li class="active">

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

ENERGY ANALYSIS

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









<div class="energy-analysis-grid">







<!-- Energy Trade -->


<div class="analysis-box">



<h3>

Energy Trade Analysis

</h3>



<div class="empty-chart">


</div>



</div>









<!-- Load -->


<div class="analysis-load">



<div class="circle">


<?php echo $grid_load; ?>%


</div>






<p>

Grid Status : Stable

</p>





</div>












<!-- Rewards -->


<div class="rewards-box">



<h3>

Rewards

</h3>









<div class="reward-bars">





<?php


$position = 1;


if(mysqli_num_rows($reward_query) > 0)
{


while($reward = mysqli_fetch_assoc($reward_query)){


?>





<div>




<span>

<?php echo $position; ?>

</span>






<p>


<?php


if($position == 1)

{

echo "🥇";

}


elseif($position == 2)

{

echo "🥈";

}


else

{

echo "🥉";

}


?>


</p>







<small>


<?php echo htmlspecialchars($reward['name']); ?>


<br>


<?php echo $reward['total_produced']; ?> kWh



</small>






</div>







<?php


$position++;


}


}


?>









</div>







</div>













<!-- Top Performing Farm -->


<div class="farm-table">



<h3>

Top Performing Farm

</h3>







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






<tr>

<td>

1

</td>

<td>

-

</td>

<td>

-

</td>

<td>

Active

</td>

</tr>






<tr>

<td>

2

</td>

<td>

-

</td>

<td>

-

</td>

<td>

Active

</td>

</tr>








<tr>

<td>

3

</td>

<td>

-

</td>

<td>

-

</td>

<td>

Active

</td>

</tr>






</table>






</div>









</div>








</main>






</div>







</body>


</html>