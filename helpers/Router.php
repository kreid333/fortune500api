<?php
require_once("Request.php");
require_once("../controllers/Fortune500Controller.php");

class Router
{
    public static function direct($uri)
    {
        if (Request::uri() != "" && count(Request::explodedUri()) >= 2) {
            switch (Request::explodedUri()[1]) {
                case "companies":
                    Fortune500Controller::getCompanies();
                    break;

                case "rank":
                    Fortune500Controller::getCompanyByRank();
                    break;

                default:
                    Request::error();
                    break;
            }
        } else {
            require("../public/views/index.view.php");
        }
    }
}
