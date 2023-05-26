<?php

namespace Core;

use Core\log\Logger;
use PDO;
use PDOException;

class DB
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
            Logger::emergency('Veritabanına bağlanamadı.', [false]);
            exit();
        }
    }

    public static function table(string $table)
    {
        $db = self::connection();
        $stm = $db->prepare("SELECT * FROM $table");
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(string $table, mixed $id)
    {
        $db = self::connection();
        $stm = $db->prepare("SELECT * FROM $table WHERE id = :id");
        $stm->bindParam(":id", $id);
        $stm->execute();

        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public static function where($table, array $values)
    {
        $section = '';
        $is_first = true;

        foreach ($values as $column => $value) {
            $section .= $is_first ? "$column = :$column" : " and $column = :$column";
            $is_first = false;
        }

        $db = self::connection();
        $stm = $db->prepare("SELECT * FROM $table WHERE $section");


        foreach ($values as $column => $value) {
            $stm->bindValue(":$column", $value);
        }

        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insert(string $table, array $data)
    {
        foreach ($data as $key => $value) {
            $values[] = ":" . $key;
        }

        $columns = implode(',', array_keys($data));
        $values = implode(',', $values);

        $db = self::connection();
        $query = "INSERT INTO $table ($columns) VALUES($values)";
        $stm = $db->prepare($query);

        foreach ($data as $key => $value) {
            $stm->bindValue(":$key", $value);
        }

        return $stm->execute();
    }

    public static function update(string $table, array $data)
    {
        $values = null;

        foreach ($data as $key => $value) {
            $values .= $key . ' = ' . "'$value'";

            if ($key !== array_key_last($data)) {
                $values .= ", ";
            }
        }

        $db = self::connection();
        $stm = $db->prepare("UPDATE $table SET $values WHERE id = " . $_POST['id']);

        return $stm->execute();
    }

    public static function delete($table, string $column, mixed $value)
    {
        $db = self::connection();
        $stm = $db->prepare("DELETE FROM $table WHERE $column = :$column");
        $stm->bindParam(":$column", $value);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}