<?php
required_once "database.php";
class GridModel
{
    public function getFarms()
    { 
    global $conn;
    $sql = "SELECT* FROM farms";
    $result = mysqli_query($conn,$sql)
    $farms = array();
    while($row = mysqli_fetch_assoc($result))
        {
            $farms[] = $row;
        }
    return $farms;
}