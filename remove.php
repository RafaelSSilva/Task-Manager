<?php 
    require 'database.php';
    deleteTask($connection, $_GET['id']);
    header('Location: tasks.php');
?>