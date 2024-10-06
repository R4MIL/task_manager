<?php

interface DBInterface
{
    function setDatabase($value);
    function setTable($value);

    function get();
    function insert();
    function update();
    function delete();
}

abstract class DBConnection implements DBInterface
{
    protected string $database;
    protected string $table;

    public function setDatabase($value): DBInterface
    {
        $this->database = $value;
        return $this;
    }

    public function setTable($value): DBInterface
    {
        $this->table = $value;
        return $this;
    }

    public function get(): bool {
        echo "Запрашиваем базу ".$this->database." из таблицы ".$this->table.'<br><br>';
        return true;
    }

    public function insert(): bool {
        echo "Добавляем в базу ".$this->database." в таблицу ".$this->table.'<br><br>'; 
        return true;
    }

    public function update(): bool {
        echo "Обвновляем базу ".$this->database." таблицу ".$this->table.'<br><br>'; 
        return true;
    }

    public function delete(): bool {
        echo "Удаляем из базы ".$this->database." из таблицы ".$this->table.'<br><br>';
        return true; 
    }
}

class User extends DBConnection
{
    private array $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function get(): bool
    {
        echo "Выборка данных: "."<br>";
        echo $this->data['name'];
        echo "<br>";
        return parent::get();
    }

    public function insert(): bool
    {
        echo "Добавление данных:" . "<br>";
        print_r($this->data);
        echo "<br>";
        return parent::insert();
    }
}

class Task extends DBConnection
{
    private array $data;
    private User $owner;

    public function __construct($data, User $owner) {
        $this->data = $data;
        $this->owner = $owner;
    }

    public function updateTask($data, User $owner) {
        $this->data = $data;
        $this->owner = $owner;
        $this->update();
    }

    public function get(): bool
    {
        echo "Выборка данных: "."<br>";
        echo $this->data['name'];
        echo "<br>";
        return parent::get();
    }

    public function insert(): bool
    {
        echo "Добавление данных:" . "<br>";
        print_r($this->data);
        echo "<br>";
        print_r($this->owner);
        echo "<br>";
        return parent::insert();
    }

    public function update(): bool
    {
        echo "Обновление данных:" . "<br>";
        print_r($this->data);
        echo "<br>";
        print_r($this->owner);
        echo "<br>";
        return parent::update();
    }

    public function delete(): bool
    {
        echo "Удаление данных:" . "<br>";
        echo $this->data['name'];
        echo "<br>";
        return parent::delete();
    }
}

?>