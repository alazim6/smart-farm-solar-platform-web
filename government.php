<?php


session_start();


$controllerPath = __DIR__ . "/app/controllers/GovernmentController.php";


if(!file_exists($controllerPath))
{

    die("Controller not found : " . $controllerPath);

}


require_once $controllerPath;



$controller = new GovernmentController();


$controller->dashboard();



?>