<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "farm_manage";


$conn = mysqli_connect(
    $host,
    $username,
    $password,
    $database
);


if(!$conn){

    die("Database Connection Failed: " . mysqli_connect_error());

}


?>