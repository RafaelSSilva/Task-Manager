
<?php
session_start();
require "database.php";
require "helpers.php";
$showTable = true;

$haveError = false;
$listError = array();


if (havePost()) :
    $task = [];

    if (array_key_exists('name', $_POST) && strlen($_POST['name']) > 0) {
        $task['name'] = $_POST['name'];
    } else {
        $haveError = true;
        $listError['name'] = 'O nome da tarefa é obrigatório!';
    }

    if (array_key_exists('description', $_POST)) {
        $task['description'] = $_POST['description'];
    } else {
        $task['description'] = '';
    }

    if (array_key_exists('term', $_POST) && strlen($_POST['term']) > 0) {
        if (checkDateTerm($_POST['term'])) {
            $task['term'] = translateDateDatabase($_POST['term']);
        } else {
            $haveError = true;
            $listError['term'] = 'O prazo não é uma data válida!';
        }
    } else {
        $task['term'] = '';
    }

    if (array_key_exists('priority', $_POST) && strlen($_POST['priority']) > 0) {
        $task['priority'] = $_POST['priority'];
    } else {
        $task['priority'] = '';
    }

    if (array_key_exists('high', $_POST)) {
        $task['high'] = 1;
    } else {
        $task['high'] = 0;
    }


    if (!$haveError) {
        addTask($connection, $task);
        header('Location: tasks.php');
        die();
    }


// $_SESSION['list_tasks'][] = $task;
endif;


// if (array_key_exists('list_tasks', $_SESSION)) :
//     $list_tasks = $_SESSION['list_tasks'];
// endif;

$list_tasks = [];
$list_tasks = getTasks($connection);

$task = [
    'id' => 0,
    'name' => (array_key_exists('name', $_POST)) ? $_POST['name'] : '',
    'description' => (array_key_exists('description', $_POST)) ? $_POST['description'] : '',
    'term' => (array_key_exists('term', $_POST)) ? $_POST['term'] : '',
    'priority' => (array_key_exists('priority', $_POST)) ? $_POST['priority'] : '',
    'high' => (array_key_exists('high', $_POST)) ? $_POST['high'] : '',
];

require "template.php";
?>



