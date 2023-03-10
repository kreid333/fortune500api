<?php
class Request
{
    public static function uri()
    {
        $uri = trim($_SERVER["REQUEST_URI"], "/");
        return $uri;
    }

    public static function explodedUri()
    {
        $exploded_uri = explode("/", self::uri());
        return $exploded_uri;
    }

    public static function year()
    {
        switch (self::explodedUri()[0]) {
            case "2022":
                $year = "twentytwentytwo";
                break;
            case "2021":
                $year = "twentytwentyone";
                break;
            case "2020":
                $year = "twentytwenty";
                break;

            default:
                $year = null;
                break;
        }

        return $year;
    }

    public static function setHeaders(array $headers)
    {
        for ($i = 0; $i < count($headers); $i++) {
            header($headers[$i]);
        }

    }

    public static function error()
    {
        http_response_code(404);
        $err = ["error" => "There is an error in your request."];
        $err = json_encode($err);
        self::setHeaders(["Access-Control-Allow-Origin: *", "Content-Type: application/json"]);
        echo $err;
    }
}
