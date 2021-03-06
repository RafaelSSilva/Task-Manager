<?php 
    $haveError = false;
    $listError = array();

    $task = new Task();
    $task->setPriority(1);

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
            if (checkDateForDatabase($_POST['term'])) {
                $task->setTerm($_POST['term']);
            } else {
                $haveError = true;
                $listError['term'] = 'O prazo não é uma data válida!';
            }
        } else {
            $task->setTerm(null);
        }

        if (array_key_exists('priority', $_POST) && strlen($_POST['priority']) > 0) {
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
            $repository_task->add($task);

            // envia lembrete de e-mail
            if (array_key_exists('email-task', $_POST)) {
                sendEmail($task);
            }

            header('Location: index.php?route=tasks');
            die();
        }
    endif;

    require  __DIR__ .  "/../views/template.php";
?>
