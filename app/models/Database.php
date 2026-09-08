<?php

require_once __DIR__ . "/../../config/database.php";


class Database
{

    public $conn;


    public function __construct()
    {

        global $conn;

        $this->conn = $conn;

    }


}

?>