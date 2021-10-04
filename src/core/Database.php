<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    public static function connection()
    {
        $env = parse_ini_file(__DIR__ . '/../.env');

        $host = $env['DB_HOST'];
        $database = $env['DB_DATABASE'];
        $username = $env['DB_USERNAME'];
        $password = $env['DB_PASSWORD'];

        try {
            $dsn = "mysql:host=$host; dbname=$database;";
            $pdo = new PDO($dsn, $username, $password);
            return $pdo;
        } catch (PDOException $e) {
            echo "Veritabanı hatası " . $e->getMessage();
            exit(1);
        }
    }
}