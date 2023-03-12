<?php
require_once("../config/Database.php");

class Fortune500
{
    // datbase info
    private $year;

    // intializing properties
    public $rank;
    public $company_name;
    public $number_of_employees;
    public $change_in_rank;
    public $revenues_in_millions;
    public $revenue_percent_change;
    public $profits_in_millions;
    public $profit_percent_change;
    public $assets_in_millions;
    public $market_value_in_millions;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function getCompanies()
    {
        $conn = Database::conn();
        $query = "SELECT 
        rank,
        company_name,
        number_of_employees,
        change_in_rank,
        revenues_in_millions,
        revenue_percent_change,
        profits_in_millions,
        profit_percent_change,
        assets_in_millions,
        market_value_in_millions 
        FROM " . $this->year;

        $stmt = $conn->query($query);
        $conn = NULL;
        
        return $stmt;
    }

    public function getCompanyByRank($rank)
    {
        $conn = Database::conn();
        $query = "SELECT 
        rank,
        company_name,
        number_of_employees,
        change_in_rank,
        revenues_in_millions,
        revenue_percent_change,
        profits_in_millions,
        profit_percent_change,
        assets_in_millions,
        market_value_in_millions 
        FROM " . $this->year . " WHERE rank = :rank";

        $stmt = $conn->prepare($query);
        $stmt->execute(["rank" => $rank]);
        $conn = NULL;
        
        return $stmt;
    }
}
