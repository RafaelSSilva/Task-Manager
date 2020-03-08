<?php

$dbServer = '127.0.0.1';
$dbUser = 'manager_tasks';
$dbPassword = 'E7A4aYTPk80RpCwc';
$dbBase = 'tasks';

// recebe os dados de conexão com o banco e abre a conexão.
$connection = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbBase);

// verifica se houve erro de conexão.
if (mysqli_connect_errno($connection)) {
    echo "Problemas para conectar no banco. Erro: ";
    echo mysqli_connect_error(); // retorna um texto com o erro.
    die(); // encerra o programa.
}

function getTasks($connection)
{
    $sql = 'SELECT * FROM tasks';
    // traz o resultado da consulta.
    $result = mysqli_query($connection, $sql);

    $tasks = [];
    while ($task = mysqli_fetch_assoc($result)) {
        $tasks[] = $task;
    }

    return $tasks;
}

/**Obtem a tarefa. */
function getTask($connection, $id)
{
    $sql = 'SELECT * FROM tasks WHERE id = ' . $id;
    $result = mysqli_query($connection, $sql);
    return mysqli_fetch_assoc($result);
}

function addTask($connection, $task)
{
    $sql = "INSERT INTO tasks 
        (name, description, term, priority, high)
        VALUES (
            '{$task['name']}',
            '{$task['description']}',
            '{$task['term']}',
            '{$task['priority']}',
             {$task['high']}
        )";

    $result = mysqli_query($connection, $sql);
}

function updateTask($connection, $task)
{
    $sql = "UPDATE tasks SET
            name = '{$task['name']}', 
            description = '{$task['description']}',
            term = '{$task['term']}',
            priority = {$task['priority']},
            high = {$task['high']}
         
          WHERE id = {$task['id']}
    ";

    mysqli_query($connection, $sql);
}

function deleteTask($connection, $id)
{
    $sql = "DELETE FROM tasks WHERE id = {$id}";
    mysqli_query($connection, $sql);
}

/* adiciona anexo na tabela anexos.*/
function addAnexo($connection, $anexo)
{
    $sql = "INSERT INTO anexos 
        (task_id, name, file)
        VALUES(
             {$anexo['task_id']},
            '{$anexo['name']}',
            '{$anexo['file']}'
        )";

    mysqli_query($connection, $sql);
}

/**Obtem os anexos da tarefa. */
function getAnexos($connection, $taskId)
{
    $sql = "SELECT * FROM anexos
        WHERE task_id = {$taskId}";

    $result = mysqli_query($connection, $sql);

    $anexos = [];
    while ($anexo = mysqli_fetch_assoc($result)) {
        $anexos[] = $anexo;
    }


    return $anexos;
}

/**busca o anexo. */
function getAnexo($connection, $id)
{
    $sql = "SELECT * FROM anexos 
        WHERE id = {$id}";

    $result = mysqli_query($connection, $sql);
    return mysqli_fetch_assoc($result);
}

/**Remove anexo. */
function removeAnexo($connection, $id){
    $sql = "DELETE FROM anexos WHERE id = {$id}";
    mysqli_query($connection, $sql);
}