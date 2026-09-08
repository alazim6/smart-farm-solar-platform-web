<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Input Data - Smart Farm Solar Platform</title>


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




<a href="/smart-farm-solar-platform-web/input-data.php" class="menu-item active">

Input Data

</a>





<a href="manage-energy.php" class="menu-item">

Manage Energy

</a>





<a href="notification.php" class="menu-item">

Notification

</a>






<a href="/smart-farm-solar-platform-web/logout.php" class="logout">

Logout

</a>



</aside>








<!-- Main Content -->


<main class="main-content">



<h1>
Daily energy data entry
</h1>



<?php

if(isset($message) && $message!="")
{

echo "<div class='success'>$message</div>";

}

?>



<p class="subtitle">

Enter today's readings, then validate and submit.

</p>






<form method="POST" action="">





<div class="form-group">


<label>
Date
</label>


<input 
type="date"
name="date"
value="<?php echo date('Y-m-d'); ?>">



</div>








<div class="energy-row">



<div class="form-group">


<label>
Energy produced (kWh)
</label>


<input 
type="number"
name="produced"
placeholder="e.g. 142"
required>


</div>








<div class="form-group">


<label>
Energy consumed (kWh)
</label>


<input 
type="number"
name="consumed"
placeholder="e.g. 90"
required>


</div>



</div>


<div class="form-group">

<label>
Energy Cost per kWh (৳)
</label>

<input 
type="number"
step="0.01"
name="energy_cost"
placeholder="e.g. 12"
required>

</div>






<div class="form-group">


<label>
Notes (optional)
</label>


<textarea
name="notes"></textarea>



</div>







<div class="button-row">



<button
name="submit"
type="submit"
class="submit-btn">

Validate and Submit

</button>





<button 
type="reset"
class="cancel-btn">

Cancel

</button>




</div>






</form>







</main>






</div>




</body>

</html>