<?php 
    require "config.php";
    require "database.php";
    require "class/task.php";
    require "class/anexo.php";
    require "class/repository_anexo.php";


    $repository_anexo = new RepositoryAnexo($pdo);
    $anexo = $repository_anexo->get($_GET['id']);
    $repository_anexo->remove($anexo->getId());
    unlink('anexos/' . $anexo->getFile());
    header('location: task.php?id=' . $anexo->getTask_id());
?>