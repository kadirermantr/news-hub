<?php

namespace App\Models;

use Core\Model;
use PDO;

class User extends Model
{
    protected static $table = 'users';
    protected static $id_column = 'user_id';

    public static function create(array $data) {
        return parent::getCreate(self::$table, $data);
    }

    public static function all(): array
    {
        return parent::getAll(self::$table);
    }

    public static function find(mixed $id): mixed
    {
        return parent::getFind(self::$table, self::$id_column, $id);
    }

    public static function delete(mixed $id): bool
    {
        return parent::getDelete(self::$table, self::$id_column, $id);
    }

    public static function where(string $columnName, mixed $id): mixed
    {
        return parent::getWhere(self::$table, $columnName, $id);
    }
}