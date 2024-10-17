<?php

namespace task_manager\Database;

use PDO;
use PDOException;

class DBConnection {

    private static $conn = null;

    public static function connect() {

        $params = parse_ini_file('./database.ini');
        if ($params === false) {
            throw new \Exception("Нет файла конфигруации подключения к БД.");
        }

        // подключение к базе данных postgresql
        try {
            $conStr = sprintf(
                "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s;",
                $params['host'],
                $params['port'],
                $params['database'],
                $params['user'],
                $params['password']
            );
            $pdo = new PDO($conStr);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Ошибка подключения к БД: '.$e->getMessage();
        }
        
    }

    public static function get()
    {
        if (self::$conn === null) {
            self::$conn = new DBConnection();
        }

        return self::$conn;
    }

    protected function __construct()
    {

    }

    protected function __clone()
    {
        
    }
}