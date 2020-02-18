
<?php 
    session_start(); 
    require "database.php";
    
  
    if (array_key_exists('name', $_GET) && $_GET['name'] != '') :
        $task = [];
        
        $task['name'] = $_GET['name'];
        
        if(array_key_exists('description', $_GET)){
            $task['description'] = $_GET['description'];
        }else{
            $task['description'] = '';
        }
        
        if(array_key_exists('term', $_GET)){
            $task['term'] = $_GET['term'];
        }else{
            $task['term'] = '';
        }
        
        if(array_key_exists('priority', $_GET)){
            $task['priority'] = $_GET['priority'];
        }else{
            $task['priority'] = '';
        }

        if(array_key_exists('high', $_GET)){
            $task['high'] = $_GET['high'];
        }else{
            $task['high'] = '';
        }


        $_SESSION['list_tasks'][] = $task;
    endif;


    $list_tasks = [];
    // if (array_key_exists('list_tasks', $_SESSION)) :
    //     $list_tasks = $_SESSION['list_tasks'];
    // endif;
    $list_tasks = getTasks($connection);


    include "template.php";
?>



