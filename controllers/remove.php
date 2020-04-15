<?php 
    $repository_task = new RepositoryTask($pdo);
    $repository_task->remove($_GET['id']);

    header('Location: index.php?route=tasks');
?>