<!DOCTYPE html>
 
<html>
 
<head>
 
    <title>Energy Transfer</title>
 
<link rel="stylesheet" href="../../assets/css/Grid Manager/style.css"> 
</head>
 
<body>
 
<div class="main">
 
    <h1>
        Energy Transfer & Grid Load Management
    </h1>
 
 
    <div class="energy">
 
 
        <div class="energy-left">
 
 
            <div class="energy-box">
 
                <h3>Total Received</h3>
 
                <p>
                    <?php echo $energy["total_received"]; ?> kWh
                </p>
 
            </div>
 
 
            <div class="energy-box">
 
                <h3>Total Distributed</h3>
 
                <p>
                    <?php echo $energy["total_distributed"]; ?> kWh
                </p>
 
            </div>
 
 
            <div class="energy-box">
 
                <h3>Net Flow</h3>
 
                <p>
                    <?php echo $netFlow; ?> kWh
                </p>
 
            </div>
 
 
        </div>
 
 
        <div class="energy-right">
 
 
            <div class="circle">
 
                <b>
                    <?php echo $energy["grid_load"]; ?>%
                </b>
 
                <span>
                    grid load
                </span>
 
            </div>
 
 
            <div class="status">
 
                Grid Status :
                <?php echo $status; ?>
 
            </div>
 
 
        </div>
 
    </div>
 
 
    <div class="bottom">
 
        <a href="index.php">
 
            ← Back to Dashboard
 
        </a>
 
    </div>
 
</div>
 
</body>
 
</html>
 