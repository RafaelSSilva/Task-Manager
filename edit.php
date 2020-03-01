<?php
session_start();
require "database.php";
require "helpers.php";
$showTable = false;
$haveError = false;
$listError = array();

if (havePost()) :
    $task = [];
    $task['id'] = $_POST['id'];

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

    if (array_key_exists('priority', $_POST)) {
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
        updateTask($connection, $task);
        header('Location: tasks.php');
        die(); //evita que o restante do arquivo seja executado de maneira desnecessária.
    }

endif;

$task = getTask($connection, $_GET['id']);

$task['name'] = (array_key_exists('name', $_POST)) ? $_POST['name'] : $task['name'];
$task['description'] = (array_key_exists('description', $_POST)) ? $_POST['description'] : $task['description'];
$task['term'] = (array_key_exists('term', $_POST)) ? $_POST['term'] : $task['term'];
$task['priority'] = (array_key_exists('priority', $_POST)) ? $_POST['priority'] : $task['priority'];
$task['high'] = (array_key_exists('high', $_POST)) ? $_POST['high'] : $task['high'];

require "template.php";
