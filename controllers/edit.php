<?php
session_start();
$task = $repository_task->get($_GET['id']);

$showTable = false;
$haveError = false;
$listError = array();

if (havePost()) :
    if (array_key_exists('name', $_POST) && strlen($_POST['name']) > 0) {
        $task->setName($_POST['name']);
    } else {
        $haveError = true;
        $listError['name'] = 'O nome da tarefa é obrigatório!';
    }

    if (array_key_exists('description', $_POST)) {
        $task->setDescription($_POST['description']);
    } else {
        $task->setDescription('');
    }

    if (array_key_exists('term', $_POST) && strlen($_POST['term']) > 0) {
        if (checkDateTerm($_POST['term'])) {
            $task->setTerm(translateDateBrToObject($_POST['term']));
        } else {
            $haveError = true;
            $listError['term'] = 'O prazo não é uma data válida!';
        }
    } else {
        $task->setTerm(new DateTime('0000-00-00'));
    }

    if (array_key_exists('priority', $_POST)) {
        $task->setPriority($_POST['priority']);
    } else {
        $task->setPriority('');
    }

    if (array_key_exists('high', $_POST)) {
        $task->setHigh(1);
    } else {
        $task->setHigh(0);
    }


    if (!$haveError) {
        $repository_task->update($task);
        
        // envia lembrete de e-mail
        if(array_key_exists('email-task', $_POST)){
            sendEmail($task);
        }

        header('Location: index.php?route=tasks');
        die(); //evita que o restante do arquivo seja executado de maneira desnecessária.
    }

endif;

require __DIR__ . "/../views/template.php";
