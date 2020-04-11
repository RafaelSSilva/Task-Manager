<?php

class RepositoryTask 
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function add(Task $task)
    {

        $name = strip_tags($this->connection->real_escape_string($task->getName()));
        $description = strip_tags($this->connection->real_escape_string($task->getDescription()));
        $priority = $task->getPriority();
        $high = $task->getHigh();
        $term = $task->getTerm();

        if(is_object($term)){
            $term = $term->format('Y-m-d');
        }

        $sql = "INSERT INTO tasks 
        (name, description, term, priority, high)
        VALUES (
            '{$name}',
            '{$description}',
            '{$term}',
            '{$priority}',
             {$high}
        )";

        $this->connection->query($sql);
    }

    public function remove(int $id)
    {   
        $id = $this->connection->real_escape_string($id);

        $sql = 'DELETE FROM tasks WHERE id = ' . $id;
        $this->connection->query($sql);
    }

    public function update(Task $task)
    {
        $name = strip_tags($this->connection->real_escape_string($task->getName()));
        $description = strip_tags($this->connection->real_escape_string($task->getDescription()));
        $priority = $task->getPriority();
        $high = $task->getHigh();
        $term = $task->getTerm();

        if(is_object($term)){
            $term = $term->format('Y-m-d');
        }

        $sql = "UPDATE tasks SET
            name = '{$name}', 
            description = '{$description}',
            term = '{$term}',
            priority = {$priority},
            high = {$high}
     
             WHERE id = {$task->getId()}";

        $this->connection->query($sql);
    }

    public function get(int $id)
    {
        $id = $this->connection->real_escape_string($id);
        
        $sql = 'SELECT * FROM tasks WHERE id = ' . $id;
        $result = $this->connection->query($sql);
        $task = $result->fetch_object('Task');

        $repository_anexo = new RepositoryAnexo($this->connection);
        $task->setAnexos($repository_anexo->list($task->getId()));

        return $task;
    }

    public function getList()
    {
        $repository_anexo = new RepositoryAnexo($this->connection);
        $sql = 'SELECT * FROM tasks';
        $result = $this->connection->query($sql);
        
        $tasks = [];

        while($task = $result->fetch_object('Task')){
            $tasks[] = $task;
            $task->setAnexos($repository_anexo->list($task->getId()));
        }

        return $tasks;
    }
}
