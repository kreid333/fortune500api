<?php
require_once("../models/Fortune500.php");
require_once("../helpers/Request.php");

class Fortune500Controller
{
    public static $offset = 0;
    public static $limit = 25;

    private static function fortune500()
    {
        if (Request::year() == NULL) {
            $fortune500 = NULL;
        } else {
            $fortune500 = new Fortune500(Request::year());
        }
        return $fortune500;
    }

    public static function getCompanies()
    {
        if (self::fortune500() == NULL) {
            Request::error();
        } else {
            if (!empty($_GET)) {
                $req_keys = array_keys($_GET);
                $valid_keys = ["page", "limit"];

                // if any of the keys in the GET array do not match any of the keys in the req_keys array...
                for ($i = 0; $i < count($req_keys); $i++) {
                    if (!in_array($req_keys[$i], $valid_keys)) {
                        Request::error();
                    }
                }

                if (isset($_GET["limit"])) {
                    if (!is_numeric($_GET["limit"]) || $_GET["limit"] > 500 || $_GET["limit"] <= 0) {
                        Request::error();
                    } else {
                        static::$limit = $_GET["limit"];
                    }
                }

                if (isset($_GET["page"])) {
                    if (!is_numeric($_GET["page"]) || ($_GET["page"] * static::$limit) > 500 || $_GET["page"] <= 0) {
                        Request::error();
                    } else {
                        static::$offset = ($_GET["page"] - 1) * static::$limit;
                    }
                }
            }


            $result = self::fortune500()->getCompanies(static::$offset, static::$limit);

            $companies = [];

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $company = [
                    "rank" => intval($rank),
                    "company_name" => $company_name,
                    "number_of_employees" => intval($number_of_employees),
                    "change_in_rank" => intval($change_in_rank),
                    "revenues_in_millions" => intval($revenues_in_millions),
                    "revenue_percent_change" => floatval($revenue_percent_change),
                    "profits_in_millions" => intval($profits_in_millions),
                    "profit_percent_change" => floatval($profit_percent_change),
                    "assets_in_millions" => intval($assets_in_millions),
                    "market_value_in_millions" => intval($market_value_in_millions)
                ];

                array_push($companies, $company);
            }

            $companies = json_encode($companies);
            Request::setHeaders(["Access-Control-Allow-Origin: *", "Content-Type: application/json"]);
            echo $companies;
        }
    }

    public static function getCompanyByRank()
    {
        if (self::fortune500() == NULL) {
            Request::error();
        } else {
            if (!isset(Request::explodedUri()[2]) || count(Request::explodedUri()) > 3 || !is_numeric(Request::explodedUri()[2]) || Request::explodedUri()[2] > 500 || Request::explodedUri()[2] <= 0 || !empty($_GET)) {
                Request::error();
            } else {
                $result = self::fortune500()->getCompanyByRank(intval(Request::explodedUri()[2]));
                $result = $result->fetch(PDO::FETCH_ASSOC);
                $result = json_encode($result);

                Request::setHeaders(["Access-Control-Allow-Origin: *", "Content-Type: application/json"]);
                echo $result;
            }
        }
    }
}
