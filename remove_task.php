<?php 
    require "database.php";

    $anexo = getAnexo($connection, $_GET['id']);
    removeAnexo($connection,  $_GET['id']);
    unlink('anexos/' . $anexo['file']);
    header('location: task.php?id=' . $anexo['task_id']);
?>