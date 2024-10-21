<?php

namespace task_manager\Models;

use PDO;
use PDOException;
use task_manager\Database\DBConnection;

abstract class Model 
{
    protected int $id;

    public function getId() {
        return $this->id;
    }

    abstract protected static function getTableName(): string;

    abstract protected static function getFields(): array;

    public static function queryBuilder($sql, $data = [], $class = null) {
        if ($class === null) {
            $class = static::class;
        }
        $conn = DBConnection::get()->connect();
        $query = $conn->prepare($sql);    
        try {
            $query->execute($data);
            return $query->fetchAll(PDO::FETCH_CLASS, $class);
        } catch (PDOException $e) {
            throw 'Ошибка выполнения запроса к БД: '.$e->getMessage();
        }
         
        return [];
    }

    public static function all() {
        $sql = "SELECT * FROM " . static::getTableName() . ";";
        return static::queryBuilder($sql);
    }

    public static function find($id) {
        $sql = "SELECT * FROM " . static::getTableName() . " WHERE id = :id;";
        $result =  static::queryBuilder($sql, ['id' => $id]);
        return $result ? $result[0] : null;
    }

    public static function create($data) {
        $fields = implode(",",static::getFields());
        $values = implode(",",array_map(fn($value) =>  ":" . $value ,static::getFields()));
        $sql = "INSERT INTO ". static::getTableName() ." (". $fields .") VALUES(". $values .");";
        static::queryBuilder($sql, $data);
    }

    public static function update($data) {
        $fields = implode(",",array_map(fn($field) =>  $field . " = :" . $field ,static::getFields()));
        $sql = "UPDATE ". static::getTableName() . " SET ". $fields ." WHERE id = :id;";
        static::queryBuilder($sql, $data);
    }

    public static function delete($id) {
        $sql = "DELETE FROM ". static::getTableName() . " WHERE id = :id;";
        static::queryBuilder($sql, ['id' => $id]);
    }

    public function hasMany($class, $foreign_key, $local_key) {
        $sql = "SELECT * FROM " . $class::getTableName() . " WHERE ". $foreign_key ." = :" . $foreign_key . ";";   
        return static::queryBuilder($sql,[$foreign_key => $local_key], $class);
    }
}