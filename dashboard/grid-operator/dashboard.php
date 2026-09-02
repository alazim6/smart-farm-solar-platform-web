<!DOCTYPE html>
 
<html>
 
<head>
 
    <title>Grid Operator Dashboard</title>
 
<link rel="stylesheet" href="../../assets/css/Grid Manager/style.css"> 
</head>
 
<body>
 
<div class="main">
 
    <h1>Grid Operator Dashboard</h1>
 
 
    <div class="dashboard">
 
 
        <!-- Connected Farms -->
 
        <div class="box">
 
            <h2>Connected Farms</h2>
 
            <table>
 
                <tr>
 
                    <th>Name</th>
                    <th>Location</th>
                    <th>Status</th>
 
                </tr>
 
 
                <?php foreach ($farms as $farm) { ?>
 
                <tr>
 
                    <td>
                        <?php echo $farm["name"]; ?>
                    </td>
 
                    <td>
                        <?php echo $farm["location"]; ?>
                    </td>
 
                    <td>
 
                        <?php
 
                        if ($farm["status"] == "Connected") {
 
                            echo "<span class='connected'>Connected</span>";
 
                        }
                        else {
 
                            echo "<span class='disconnected'>Disconnected</span>";
 
                        }
 
                        ?>
 
                    </td>
 
                </tr>
 
                <?php } ?>
 
            </table>
 
        </div>
 
 
 
        <!-- Connection Requests -->
 
        <div class="box">
 
            <h2>
                Approve Grid
                <br>
                Connection Requests
            </h2>
 
 
            <?php foreach ($requests as $request) { ?>
 
            <div class="request">
 
                <b>
                    <?php echo $request["farm_name"]; ?>
                </b>
 
                <br>
 
                <?php echo $request["location"]; ?>
 
                <br><br>
 
 
                <a
                    class="accept"
                    href="index.php?page=accept&id=<?php echo $request["id"]; ?>"
                >
                    Accepted
                </a>
 
 
                <a
                    class="reject"
                    href="index.php?page=reject&id=<?php echo $request["id"]; ?>"
                >
                    Reject
                </a>
 
            </div>
 
            <?php } ?>
 
 
            <?php
 
            if (count($requests) == 0) {
 
                echo "<p>No new requests.</p>";
 
            }
 
            ?>
 
        </div>
 
    </div>
 
 
 
    <div class="bottom">
 
        <a href="index.php?page=energy">
 
            Energy Transfer & Grid Load
 
        </a>
 
    </div>
 
</div>
 
</body>
 
</html>
 