<?php

require_once "Database.php";


class Notification
{

    private $conn;


    public function __construct()
    {

        $database = new Database();

        $this->conn = $database->conn;

    }



    public function getNotifications($user_id)
    {

        $sql = "SELECT * FROM notifications
                WHERE user_id='$user_id'
                ORDER BY id DESC";


        return mysqli_query($this->conn,$sql);

    }


}

?>