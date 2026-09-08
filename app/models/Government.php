<?php


class Government
{


    private $conn;



    public function __construct($db)
    {

        $this->conn = $db;

    }







    // ==========================
    // TOTAL FARM
    // ==========================


    public function getTotalFarms()
    {


        $query = mysqli_query(

            $this->conn,

            "SELECT COUNT(*) AS total
             FROM users
             WHERE role='Farm Owner'"

        );


        if(!$query)
        {
            die(mysqli_error($this->conn));
        }


        $data = mysqli_fetch_assoc($query);


        return $data['total'] ?? 0;


    }









    // ==========================
    // TOTAL ENERGY
    // ==========================


    public function getTotalEnergy()
    {


        $query = mysqli_query(

            $this->conn,

            "SELECT SUM(produced) AS total
             FROM energy_data"

        );


        if(!$query)
        {
            die(mysqli_error($this->conn));
        }


        $data = mysqli_fetch_assoc($query);


        return $data['total'] ?? 0;


    }









    // ==========================
    // TOTAL CONSUMED
    // ==========================


    public function getTotalConsumed()
    {


        $query = mysqli_query(

            $this->conn,

            "SELECT SUM(consumed) AS total
             FROM energy_data"

        );


        if(!$query)
        {
            die(mysqli_error($this->conn));
        }


        $data = mysqli_fetch_assoc($query);


        return $data['total'] ?? 0;


    }









    // ==========================
    // NOTIFICATIONS
    // ==========================


    public function getNotifications()
    {


        $query = mysqli_query(

            $this->conn,

            "SELECT *
             FROM notifications
             ORDER BY id DESC
             LIMIT 3"

        );


        if(!$query)
        {
            die(mysqli_error($this->conn));
        }


        return $query;


    }









    // ==========================
    // TOP FARMS
    // ==========================


    public function getTopFarms()
    {


        $query = mysqli_query(

            $this->conn,

            "
            SELECT 

            users.name,

            SUM(energy_data.produced) AS total_produced


            FROM users


            JOIN energy_data

            ON users.id = energy_data.user_id


            WHERE users.role='Farm Owner'


            GROUP BY users.id


            ORDER BY total_produced DESC


            LIMIT 3

            "

        );


        if(!$query)
        {
            die(mysqli_error($this->conn));
        }


        return $query;


    }









    // ==========================
    // REGION DATA
    // ==========================


    public function getRegionData()
    {


        $query = mysqli_query(

            $this->conn,

            "
            SELECT

            location,

            SUM(energy_data.produced) AS capacity


            FROM users


            JOIN energy_data

            ON users.id = energy_data.user_id


            WHERE users.role='Farm Owner'


            GROUP BY location


            ORDER BY capacity DESC


            LIMIT 6

            "

        );


        if(!$query)
        {
            die(mysqli_error($this->conn));
        }


        return $query;


    }









    // ==========================
    // GRID CAPACITY
    // ==========================


    public function getGridCapacity()
    {


        $query = mysqli_query(

            $this->conn,

            "SELECT SUM(produced) AS total
             FROM energy_data"

        );


        $data = mysqli_fetch_assoc($query);


        return $data['total'] ?? 0;


    }









    // ==========================
    // TODAY ENERGY
    // ==========================


    public function getTodayEnergy()
    {


        $query = mysqli_query(

            $this->conn,

            "
            SELECT SUM(produced) AS total

            FROM energy_data

            WHERE date = CURDATE()

            "

        );


        $data = mysqli_fetch_assoc($query);


        return $data['total'] ?? 0;


    }









    // ==========================
    // GRID EFFICIENCY
    // ==========================


    public function getGridEfficiency()
    {


        $query = mysqli_query(

            $this->conn,

            "
            SELECT

            SUM(produced) AS produced,

            SUM(consumed) AS consumed


            FROM energy_data

            "

        );


        $data = mysqli_fetch_assoc($query);



        if(
            isset($data['produced']) &&
            $data['produced'] > 0
        )
        {


            return round(

                ($data['consumed'] / $data['produced']) * 100

            );


        }


        return 0;


    }









    // ==========================
    // GRID LOAD
    // ==========================


    public function getGridLoad()
    {

        return $this->getGridEfficiency();

    }









    // ==========================
    // ANALYSIS
    // ==========================


    public function getAnalysisCapacity()
    {

        return $this->getGridCapacity();

    }



    public function getAnalysisTodayEnergy()
    {

        return $this->getTodayEnergy();

    }



    public function getAnalysisEfficiency()
    {

        return $this->getGridEfficiency();

    }



    public function getAnalysisLoad()
    {

        return $this->getGridLoad();

    }









    // ==========================
    // REWARD
    // ==========================


    public function getRewardRanking()
    {

        return $this->getTopFarms();

    }









    // ==========================
    // GOVERNMENT NOTIFICATION
    // ==========================


    public function getGovernmentNotifications($user_id)
    {


        $query = mysqli_query(

            $this->conn,

            "
            SELECT *

            FROM notifications

            ORDER BY id DESC

            LIMIT 10

            "

        );


        if(!$query)
        {
            die(mysqli_error($this->conn));
        }


        return $query;


    }




}

?>