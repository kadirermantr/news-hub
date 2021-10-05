<?php

namespace Core;

use App\Models\User;
use PDO;

abstract class Model
{
    public static function getDB()
    {
        return Database::connection();
    }

    public static function getCreate(string $table, array $data)
    {
        foreach ($data as $key => $value) {
            $values[] = ":" . $key;
        }

        $columns = implode(',', array_keys($data));
        $values = implode(',', $values);

        $db = self::getDB();
        $query = "INSERT INTO $table ($columns) VALUES($values);";
        $stm = $db->prepare($query);

        foreach ($data as $key => $value) {
            $stm->bindValue(":$key", $value);
        }

        return $stm->execute();
    }

    // update

    public static function getAll(string $table): array
    {
        $db = self::getDB();
        $stm = $db->query("SELECT * FROM $table");
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getFind(string $table, string $id_name, mixed $id): mixed
    {
        $db = self::getDB();
        $stm = $db->prepare("SELECT * FROM $table WHERE $id_name = :id");
        $stm->bindParam(":id", $id);
        $stm->execute();

        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public static function getDelete(string $table, string $id_name, mixed $id): bool
    {
        $db = self::getDB();
        $stm = $db->prepare("DELETE FROM $table WHERE $id_name = :id");
        $stm->bindParam(":id", $id);

        return $stm->execute();
    }

    public static function getWhere(string $table, string $columnName, mixed $id): mixed
    {
        $db = self::getDB();
        $stm = $db->prepare("SELECT * FROM $table WHERE $columnName = :$columnName");
        $stm->bindParam(":$columnName", $id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getWhereAll(string $table, string $columnName1, $columnName2, mixed $id1, mixed $id2): mixed
    {
        $db = self::getDB();
        $stm = $db->prepare("SELECT * FROM $table WHERE $columnName1 = :$columnName1 AND $columnName2 = :$columnName2");
        $stm->bindParam(":$columnName1", $id1);
        $stm->bindParam(":$columnName2", $id2);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}