<?php

require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Energy.php";
require_once __DIR__ . "/../models/Notification.php";


class FarmOwnerController
{


    public function dashboard()
    {


        session_start();


        if(!isset($_SESSION['user_id']))
        {

            header("Location: /smart-farm-solar-platform-web/login.php");

            exit();

        }



        $userModel = new User();


        $user = $userModel->getUserById($_SESSION['user_id']);




        $energyModel = new Energy();



        $today = $energyModel->getTodayEnergy($_SESSION['user_id']);



        $recent = $energyModel->getRecentEnergy($_SESSION['user_id']);




        $produced = $today ? $today['produced'] : 0;


        $consumed = $today ? $today['consumed'] : 0;


        $net = $produced - $consumed;




        include __DIR__ . "/../views/farm-owner/dashboard.php";


    }








public function inputData()
{


    session_start();



    if(!isset($_SESSION['user_id']))
    {

        header("Location: /smart-farm-solar-platform-web/login.php");

        exit();

    }



    $message = "";



    if(isset($_POST['submit']))
    {


        $energyModel = new Energy();



        $result = $energyModel->saveEnergy(

            $_SESSION['user_id'],

            $_POST['date'],

            $_POST['produced'],

            $_POST['consumed'],

            $_POST['energy_cost'],

            $_POST['notes']

        );



        if($result)
        {

            $message = "Energy data saved successfully!";

        }

        else
        {

            $message = "Error saving data!";

        }


    }



    include __DIR__ . "/../views/farm-owner/input-data.php";


}










    public function manageEnergy()
    {


        session_start();



        if(!isset($_SESSION['user_id']))
        {

            header("Location: /smart-farm-solar-platform-web/login.php");

            exit();

        }



        $energyModel = new Energy();



        $energy_query = $energyModel->getEnergyHistory($_SESSION['user_id']);



        $message = "";



        if(isset($_POST['save_target']))
        {


            $result = $energyModel->saveTarget(

                $_SESSION['user_id'],

                $_POST['target']

            );



            if($result)
            {

                $message = "Energy target saved successfully!";

            }


        }



        include __DIR__ . "/../views/farm-owner/manage-energy.php";


    }








    public function notification()
    {


        session_start();



        if(!isset($_SESSION['user_id']))
        {

            header("Location: /smart-farm-solar-platform-web/login.php");

            exit();

        }



        $notificationModel = new Notification();



        $notifications = $notificationModel->getNotifications($_SESSION['user_id']);



        include __DIR__ . "/../views/farm-owner/notification.php";


    }



}

?>