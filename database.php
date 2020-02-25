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
