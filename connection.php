<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

class Database{
    public static $connection;

    public static function setupConnection(){
        if (!isset(Database::$connection)){
            new mysqli($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE'], $_ENV['MYSQL_PORT']);
        }
    }

    // insert update delete
    public static function iud($q){
        Database::setupConnection();
        Database::$connection->query($q);
    }

    public static function search($q){
        Database::setupConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}