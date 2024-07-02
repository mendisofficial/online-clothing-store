<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

class Database {
    public static $connection;

    public static function setupConnection() {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli(
                $_ENV['MYSQL_HOST'],
                $_ENV['MYSQL_USER'],
                $_ENV['MYSQL_PASSWORD'],
                $_ENV['MYSQL_DATABASE'],
                $_ENV['MYSQL_PORT']
            );

            if (Database::$connection->connect_error) {
                die("Connection failed: " . Database::$connection->connect_error);
            }
        }
    }

    // Insert, update, delete
    public static function iud($q) {
        Database::setupConnection();
        Database::$connection->query($q);
    }

    // Search
    public static function search($q) {
        Database::setupConnection();
        return Database::$connection->query($q);
    }
}