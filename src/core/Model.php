<?php

namespace Core;

abstract class Model
{
    public static function all() {
        $table = static::$table;
        return DB::table($table);
    }
    public static function find($id) {
        $table = static::$table;
        return DB::find($table, $id);
    }

    public static function where(array $values) {
        $table = static::$table;
        return DB::where($table, $values);
    }

    public static function create(array $data)
    {
        $table = static::$table;
        return DB::insert($table, $data);
    }

    public static function update(array $values)
    {
        $table = static::$table;
        return DB::update($table, $values);
    }

    public static function delete(string $column, mixed $value)
    {
        $table = static::$table;
        return DB::delete($table, $column, $value);
    }
}