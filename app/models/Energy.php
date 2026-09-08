<?php

require_once "Database.php";


class Energy
{

    private $conn;


    public function __construct()
    {

        $database = new Database();

        $this->conn = $database->conn;

    }



    public function getTodayEnergy($user_id)
    {

        $sql = "SELECT * FROM energy_data
                WHERE user_id='$user_id'
                ORDER BY id DESC
                LIMIT 1";


        $result = mysqli_query($this->conn,$sql);


        return mysqli_fetch_assoc($result);

    }




    public function getRecentEnergy($user_id)
    {

        $sql = "SELECT * FROM energy_data
                WHERE user_id='$user_id'
                ORDER BY id DESC
                LIMIT 5";


        return mysqli_query($this->conn,$sql);

    }




    public function saveEnergy($user_id, $date, $produced, $consumed, $energy_cost, $notes)
{


    $sql = "INSERT INTO energy_data

    (
    user_id,
    date,
    produced,
    consumed,
    energy_cost,
    notes
    )

    VALUES

    (
    '$user_id',
    '$date',
    '$produced',
    '$consumed',
    '$energy_cost',
    '$notes'
    )";




    if(mysqli_query($this->conn,$sql))
    {


        $notification_sql = "INSERT INTO notifications

        (
        user_id,
        message
        )

        VALUES

        (
        '$user_id',
        'Energy data submitted successfully.'
        )";



        mysqli_query($this->conn,$notification_sql);



        return true;


    }
    else
    {

        return false;

    }


}





    public function getEnergyHistory($user_id)
    {


        $sql = "SELECT * FROM energy_data

                WHERE user_id='$user_id'

                ORDER BY id DESC";


        return mysqli_query($this->conn,$sql);


    }





    public function saveTarget($user_id,$target)
    {


        $sql = "INSERT INTO energy_targets

                (user_id,target)

                VALUES

                (
                '$user_id',
                '$target'
                )";


        return mysqli_query($this->conn,$sql);


    }



}

?>