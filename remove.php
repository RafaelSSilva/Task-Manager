<?php 
    require "config.php";
    require 'database.php';
    require 'class/task.php';
    require 'class/repository_task.php';

    $repository_task = new RepositoryTask($connection);
    $repository_task->remove($_GET['id']);

    header('Location: tasks.php');
?>