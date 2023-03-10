<?php
require_once("Request.php");
require_once("../controllers/Fortune500Controller.php");

class Router
{
    public static function direct($uri)
    {
        switch (Request::explodedUri()[1]) {
            case "companies":
                Fortune500Controller::getCompanies();
                break;

            default:
                Request::error();
                break;
        }
    }
}
