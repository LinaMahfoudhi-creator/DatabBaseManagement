<?php
class ConnexionBD
{
    private static $db_name = "myfirstdatabase";
    private static $db_user = "root";
    private static $db_host = "localhost";
    private static $db = null;
    private function __construct()
    {
        try {
            self::$db = new PDO("mysql:host=" . self::$db_host . ";dbname=" . self::$db_name, self::$db_user, "");
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
    public static function getInstance()
    {
        if (self::$db == null) {
            new ConnexionBD();
        }
        return self::$db;
    }
}
