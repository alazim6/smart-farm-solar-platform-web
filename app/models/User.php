<?php

require_once "Database.php";


class User
{

    private $db;


    public function __construct()
    {

        $database = new Database();

        $this->db = $database->conn;

    }



    public function getUserById($id)
    {

        $sql = "SELECT * FROM users WHERE id='$id'";


        $result = mysqli_query($this->db,$sql);


        return mysqli_fetch_assoc($result);

    }



    public function getAllUsers()
    {

        $sql = "SELECT * FROM users";


        $result = mysqli_query($this->db,$sql);


        $users=[];


        while($row=mysqli_fetch_assoc($result))
        {

            $users[]=$row;

        }


        return $users;

    }


}

?>