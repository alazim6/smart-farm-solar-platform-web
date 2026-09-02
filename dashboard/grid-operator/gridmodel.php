<?php
 
require_once "database.php";
 
class GridModel
{
 
    public function getFarms()
    {
        global $conn;
 
        $sql = "SELECT * FROM farms";
 
        $result = mysqli_query($conn, $sql);
 
        $farms = array();
 
        while ($row = mysqli_fetch_assoc($result)) {
            $farms[] = $row;
        }
 
        return $farms;
    }
 
 
    public function getRequests()
    {
        global $conn;
 
        $sql = "SELECT * FROM connection_requests
                WHERE status = 'Pending'";
 
        $result = mysqli_query($conn, $sql);
 
        $requests = array();
 
        while ($row = mysqli_fetch_assoc($result)) {
            $requests[] = $row;
        }
 
        return $requests;
    }
 
 
    public function getEnergy()
    {
        global $conn;
 
        $sql = "SELECT * FROM energy_data
                ORDER BY id DESC
                LIMIT 1";
 
        $result = mysqli_query($conn, $sql);
 
        return mysqli_fetch_assoc($result);
    }
 
 
    public function acceptRequest($id)
    {
        global $conn;
 
     
 
        $sql = "SELECT * FROM connection_requests
                WHERE id = $id";
 
        $result = mysqli_query($conn, $sql);
 
        $request = mysqli_fetch_assoc($result);
 
 
        if ($request) {
 
            $name = $request["farm_name"];
            $location = $request["location"];
 
 
           
 
            $sql = "INSERT INTO farms
                    (name, location, status)
                    VALUES
                    ('$name', '$location', 'Connected')";
 
            mysqli_query($conn, $sql);
 
 
       
 
            $sql = "UPDATE connection_requests
                    SET status = 'Accepted'
                    WHERE id = $id";
 
            mysqli_query($conn, $sql);
        }
    }
 
 
    public function rejectRequest($id)
    {
        global $conn;
 
        $sql = "UPDATE connection_requests
                SET status = 'Rejected'
                WHERE id = $id";
 
        mysqli_query($conn, $sql);
    }
}
 
?>