<?php

namespace task_manager\Models;

class Task extends Model 
{
    private string $name;
    private string $description;
    private string $deadline;
    private int $owner_id;

    public function getName():string {
        return $this->name;
    }
    public function getDescription():string {
        return $this->description;
    }
    public function getDeadline():string {
        return $this->deadline;
    }
    public function getOwnerId():string {
        return $this->owner_id;
    }

    protected static function getTableName(): string
    {
        return 'tasks';
    }

    protected static function getFields(): array
    {   
        return ['name','description','deadline','owner_id'];
    }
}