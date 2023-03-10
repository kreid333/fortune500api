<?php
class Database
{
    private static $host = "localhost";
    private static $name = "fortune500";
    private static $username = "root";
    private static $password = "root";

    private static $pdo;

    public static function conn()
    {
        self::$pdo = null;

        try {
            self::$pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$name, self::$username, self::$password);

            // setting ERRMODE attribute to throw exceptions if anything goes wrong
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

        return self::$pdo;
    }
}
