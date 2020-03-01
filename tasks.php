
<?php
session_start();
require "database.php";
require "helpers.php";
$showTable = true;

if (array_key_exists('name', $_GET) && $_GET['name'] != '') :
    $task = [];

    $task['name'] = $_GET['name'];

    if (array_key_exists('description', $_GET)) {
        $task['description'] = $_GET['description'];
    } else {
        $task['description'] = '';
    }

    if (array_key_exists('term', $_GET)) {
        $task['term'] = translateDate($_GET['term']);
    } else {
        $task['term'] = '';
    }

    if (array_key_exists('priority', $_GET)) {
        $task['priority'] = $_GET['priority'];
    } else {
        $task['priority'] = '';
    }

    if (array_key_exists('high', $_GET)) {
        $task['high'] = 1;
    } else {
        $task['high'] = 0;
    }

    addTask($connection, $task);
    header('Location: tasks.php');
    die();

// $_SESSION['list_tasks'][] = $task;
endif;


// if (array_key_exists('list_tasks', $_SESSION)) :
//     $list_tasks = $_SESSION['list_tasks'];
// endif;

$list_tasks = [];
$list_tasks = getTasks($connection);

$task = [
    'id' => 0,
    'name' => '',
    'description' => '',
    'term' => '',
    'priority' => 1,
    'high' => ''
];

require "template.php";
?>



