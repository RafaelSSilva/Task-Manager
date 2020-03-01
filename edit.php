<?php 
    session_start();
    require "database.php";
    require "helpers.php";
    $showTable = false;

    if (array_key_exists('name', $_GET) && $_GET['name'] != '') :
        $task = [];
        $task['id'] = $_GET['id'];
        
        $task['name'] = $_GET['name'];
        
        if(array_key_exists('description', $_GET)){
            $task['description'] = $_GET['description'];
        }else{
            $task['description'] = '';
        }
        
        if(array_key_exists('term', $_GET)){
            $task['term'] = translateDate($_GET['term']);
        }else{
            $task['term'] = '';
        }
        
        if(array_key_exists('priority', $_GET)){
            $task['priority'] = $_GET['priority'];
        }else{
            $task['priority'] = '';
        }

        if(array_key_exists('high', $_GET)){
            $task['high'] = 1;
        }else{
            $task['high'] = 0;
        }

        updateTask($connection, $task);
        header('Location: tasks.php');
        die(); //evita que o restante do arquivo seja executado de maneira desnecessária.

    endif;

    $task = getTask($connection, $_GET['id']);
    require "template.php";
?>

