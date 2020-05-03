<?php

class RepositoryTask
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**Adiciona tarefa */
    public function add(Task $task)
    {
        // definindo sql com prepared statements
        $sql = "
            INSERT INTO tasks 
            (name, description, term, priority, high)
            VALUES (:name, :description, :term, :priority, :high)
        ";

        //preparando a query
        $query = $this->pdo->prepare($sql);

        // executando a query com os parâmetros nomeados.
        $query->execute(
            [
                'name' => strip_tags($task->getName()),
                'description' => strip_tags($task->getDescription()),
                'priority' => $task->getPriority(),
                'term' => $task->getTerm(),
                'high' => $task->getHigh() ? 1 : 0
            ]
        );
    }

    /**Remove tarefa */
    public function remove(int $id)
    {
        // definindo sql com prepared statements
        $sql = 'DELETE FROM tasks WHERE id = :id';

        //preparando a query
        $query = $this->pdo->prepare($sql);

        // executando a query com os parâmetros nomeados.
        $query->execute(['id' => $id,]);

        // remove todos os anexos da tarefa do banco.
        $sql = "DELETE FROM anexos WHERE task_id = :id";

        //preparando a query
        $query = $this->pdo->prepare($sql);

        // executando a query com os parâmetros nomeados.
        $query->execute(['id' => $id]);

        // remove o diretório da pasta de dentro do sistema de arquivos.
        $folder =  is_dir(__DIR__ . "/../anexos/{$id}") ? __DIR__ . "/../anexos/{$id}" : '';

        if (strlen($folder) <= 0) {
            return;
        }

        $directory = dir($folder);

        while ($file = $directory->read()) {
            if ($file != '..' && $file != '.') {
                unlink("{$folder}/$file");
            }
        }

        $directory->close();

        // remove pasta
        rmdir($folder);
    }

    /**Atualiza tarefa */
    public function update(Task $task)
    {
       // definindo sql com prepared statements
        $sql = "
            UPDATE tasks SET
                name = :name, 
                description= :description,
                term = :term,
                priority = :priority,
                high = :high
             WHERE id = :id
        ";

        //preparando a query
        $query = $this->pdo->prepare($sql);

        // executando a query com os parâmetros nomeados.
        $query->execute(
            [
                'name' => strip_tags($task->getName()),
                'description' => strip_tags($task->getDescription()),
                'priority' => $task->getPriority(),
                'term' => $task->getTerm(),
                'high' => $task->getHigh(),
                'id' => $task->getId()
            ]
        );
    }

    /**Busca tarefa */
    public function get(int $id)
    {
        // definindo sql com prepared statements
        $sql = 'SELECT * FROM tasks WHERE id = :id';

        //preparando a query
        $query = $this->pdo->prepare($sql);

        // executando a query com os parâmetros nomeados.
        $query->execute(
            [
                'id' => $id
            ]
        );

        $task = $query->fetchObject('Task');

        $repository_anexo = new RepositoryAnexo($this->pdo);
        $task->setAnexos($repository_anexo->list($task->getId()));

        return $task;
    }


    /**busca  tarefas com paginação. */
    function getTasksPagination($start, $end)
    {
        // definindo sql com prepared statements
        $sql = 'SELECT * FROM tasks ORDER BY creation_date DESC LIMIT :start, :end';

        //preparando a query
        $query = $this->pdo->prepare($sql);

        $query->bindParam(":start", $start);
        $query->bindParam(":start", $start, PDO::PARAM_INT);
        $query->bindParam(":end", $end);
        $query->bindParam(":end", $end, PDO::PARAM_INT);

        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, "Task");
    }

    /**Busca lista de tarefas */
    public function getList()
    {
        $repository_anexo = new RepositoryAnexo($this->pdo);
        $sql = 'SELECT * FROM tasks';


        $result = $this->pdo->query(
            $sql,
            PDO::FETCH_CLASS,
            'Task'
        );

        $tasks = [];

        foreach ($result as $task) {
            $task->setAnexos($repository_anexo->list($task->getId()));
            $tasks[] = $task;
        }

        return $tasks;
    }

    /** conta o número de registros da tabela tasks. */
    public function countTasks()
    {
        $sql = 'SELECT count(*) FROM tasks';
        $result = $this->pdo->query($sql);
        $result->execute();

        return $result->fetchColumn();
    }

    /**
     * Get the value of pdo
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @return  self
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }
}
