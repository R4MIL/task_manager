<?php

abstract class DBConnection
{
    static protected $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function connect() {
        echo "Подключение к БД - ". $this->database .'<br>';
    }
    abstract public function get();
    abstract public function save();
    abstract public function delete();
}

class User extends DBConnection
{
    public $name;

    public function __construct($database,$name) {
        parent::__construct($database);
        $this->name = $name;
    }

    public function get() {
        $this->connect();
        echo "Запрашиваем из таблицы Users".'<br>';
    }

    public function save() {
        $this->connect();
        echo "Записываем в таблицу Users".'<br>';    
    }

    public function delete() {
    }

    public function infoUser() {
        $this->get();
        echo "Результат: Пользователь: ".$this->name.'<br><br>';    
    }

    public function addUser() {
        $this->save();
        echo "Результат: Добавлен пользователь".'<br><br>';
    }
}

class Task extends DBConnection
{
    private $name;
    private User $owner;
    private $deadline;

    public function __construct($database, $name, User $owner, $deadline) {
        parent::__construct($database);
        $this->name = $name;
        $this->owner = $owner;
        $this->deadline = $deadline;
    }

    public function __destruct() {
        $this->delete();
        echo "Результат: Задача удалена".'<br><br>';
    }

    public function get() {
        $this->connect();
        echo "Запрашиваем из таблицы Tasks".'<br>';
    }

    public function save() {
        $this->connect();
        echo "Записываем в таблицу Tasks".'<br>';    
    }

    public function delete() {
        $this->connect();
        echo "Удаляем из таблицы Tasks".'<br>';    
    }

    public function infoTask()
    {
        $this->get();
        echo "Название '".$this->name."', ответственный: ".$this->owner->name.", срок до ".$this->deadline.'<br><br>';  
    }

    public function createTask() {
        $this->save();
        echo "Результат: Задача создана".'<br><br>';
    }

    public function updateTask(User $owner, $deadline) {
        $this->save();
        $this->owner = $owner;
        $this->deadline = $deadline;

        echo "Результат: Задача изменена".'<br><br>';
    }
}

?>