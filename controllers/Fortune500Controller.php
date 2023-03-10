<?php
require_once("../models/Fortune500.php");
require_once("../helpers/Request.php");

class Fortune500Controller
{
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
            $result = self::fortune500()->getCompanies();

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
}
