<?php


require_once __DIR__ . "/../../config/database.php";

require_once __DIR__ . "/../models/Government.php";




class GovernmentController
{


    private $government;



    public function __construct()
    {


        global $conn;


        $this->government = new Government($conn);


    }






    // ==========================
    // DASHBOARD
    // ==========================


    public function dashboard()
    {


        $total_farms =
        $this->government->getTotalFarms();



        $total_energy =
        $this->government->getTotalEnergy();



        $total_consumed =
        $this->government->getTotalConsumed();




        $notification_query =
        $this->government->getNotifications();




        $top_farm_query =
        $this->government->getTopFarms();




        $region_query =
        $this->government->getRegionData();




        require __DIR__ . "/../views/government/dashboard.php";


    }









    // ==========================
    // TOTAL GRID
    // ==========================


    public function totalGrid()
    {


        $total_capacity =
        $this->government->getGridCapacity();



        $today_energy =
        $this->government->getTodayEnergy();



        $grid_efficiency =
        $this->government->getGridEfficiency();



        $grid_load =
        $this->government->getGridLoad();




        if($grid_load < 80)
        {


            $grid_status = "Stable";


            $grid_message =
            "All systems are operating within normal parameters.";


        }

        elseif($grid_load >= 80 && $grid_load < 90)
        {


            $grid_status = "Moderate";


            $grid_message =
            "Grid load is increasing. Monitoring required.";


        }

        else
        {


            $grid_status = "High Load";


            $grid_message =
            "Grid is under high load. Immediate attention required.";


        }




        require __DIR__ . "/../views/government/total-grid.php";


    }









    // ==========================
    // ENERGY ANALYSIS
    // ==========================


    public function energyAnalysis()
    {


        $total_capacity =
        $this->government->getAnalysisCapacity();



        $today_energy =
        $this->government->getAnalysisTodayEnergy();



        $grid_efficiency =
        $this->government->getAnalysisEfficiency();



        $grid_load =
        $this->government->getAnalysisLoad();



        $reward_query =
        $this->government->getRewardRanking();




        require __DIR__ . "/../views/government/energy-analysis.php";


    }









    // ==========================
    // NOTIFICATION
    // ==========================


    public function notification()
    {


        $user_id = 0;


        if(isset($_SESSION['user_id']))
        {

            $user_id = $_SESSION['user_id'];

        }




        $query =
        $this->government->getGovernmentNotifications($user_id);




        require __DIR__ . "/../views/government/notification.php";


    }





}

?>