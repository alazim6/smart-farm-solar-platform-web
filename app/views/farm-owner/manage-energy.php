<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Energy</title>


<link rel="stylesheet" href="/smart-farm-solar-platform-web/assets/css/farm-owner/farm-owner-combined.css">
</head>


<body>


<div class="app">



<!-- SIDEBAR -->

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




<a href="/smart-farm-solar-platform-web/farm-owner.php" class="menu">

Dashboard

</a>




<a href="/smart-farm-solar-platform-web/input-data.php" class="menu">

Input Data

</a>




<a href="/smart-farm-solar-platform-web/manage-energy.php" class="menu active">

Manage Energy

</a>




<a href="/smart-farm-solar-platform-web/notification.php" class="menu">

Notification

</a>




<a href="/smart-farm-solar-platform-web/logout.php" class="logout">

Logout

</a>



</aside>







<!-- MAIN CONTENT -->


<main class="content">



<h1>
Manage Energy
</h1>



<p class="subtitle">

Set targets, view usage summary, and manage your energy preferences.

</p>







<div class="top-section">





<!-- ENERGY TARGET -->


<div class="box target-box">


<div class="section-title">


<span class="number">
1
</span>


<h2>
Energy Target
</h2>


</div>




<p>
Set your daily energy consumption target.
</p>





<?php if(isset($message) && $message!=""): ?>

<div class="success">

<?php echo $message; ?>

</div>

<?php endif; ?>






<form method="POST" action="">


<label>
Daily Target (kWh)
</label>



<div class="target-input">


<input 
type="number"
name="target"
value="100"
min="1"
required>


<span>
kWh
</span>


</div>





<button 
name="save_target"
type="submit">

Save Target

</button>



</form>



</div>









<!-- ENERGY SUMMARY -->


<div class="box summary-box">


<div class="section-title">


<span class="number">
2
</span>


<h2>
Energy Summary
</h2>


</div>




<p>
Summary of your energy usage.
</p>





<table>


<thead>


<tr>

<th>
Date
</th>


<th>
Produced (kWh)
</th>


<th>
Consumed (kWh)
</th>


<th>
Net (kWh)
</th>


</tr>


</thead>





<tbody>



<?php


if(mysqli_num_rows($energy_query) > 0)
{


while($row = mysqli_fetch_assoc($energy_query))
{


$net = $row['produced'] - $row['consumed'];

?>


<tr>


<td>
<?php echo $row['date']; ?>
</td>



<td>
<?php echo $row['produced']; ?>
</td>



<td>
<?php echo $row['consumed']; ?>
</td>



<td>
<?php echo $net; ?>
</td>



</tr>


<?php

}

}

else

{

?>


<tr>

<td colspan="4">

No energy data found

</td>

</tr>


<?php

}

?>


</tbody>


</table>



</div>



</div>











<!-- GRID CONNECTION -->


<div class="box grid-box">



<div class="section-title">


<span class="number">
3
</span>


<div>

<h2>
Request Grid Connection & Transfer Energy
</h2>


<p>
Request grid connection and transfer surplus energy to the grid.
</p>


</div>


</div>






<div class="grid-content">





<div class="connection-card">


<div class="card-heading">


<h3>
Grid Connection Status
</h3>



<span class="connected">
Connected
</span>


</div>






<div class="details">


<div>

<span>
Connection ID
</span>

<strong>
GCN-2026-0158
</strong>

</div>





<div>

<span>
Connection Date
</span>

<strong>
May 10, 2026
</strong>

</div>





<div>

<span>
Status
</span>

<strong class="green">
Connected
</strong>

</div>





<div>

<span>
Last Sync
</span>

<strong>
10:30 AM, May 21, 2026
</strong>

</div>



</div>





<form method="POST">


<button class="details-button">

Request Grid Connection
<span>
→
</span>


</button>


</form>



</div>









<div class="transfer-card">


<h3>
Energy Transfer (This Month)
</h3>




<div class="transfer-info">



<div>

<span>
Transferred
</span>


<strong>
500 kWh
</strong>


</div>





<div>

<span>
Earnings
</span>


<strong>
৳ 6,250
</strong>


</div>




<div class="energy-icon">
⚡
</div>



</div>



</div>





</div>



</div>







</main>


</div>


</body>


</html>