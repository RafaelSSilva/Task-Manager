<?php
require "config.php";
require "database.php";
require "helpers.php";
require "class/task.php";
require "class/repository_task.php";
require "class/anexo.php";
require "class/repository_anexo.php";

$have_error = false;
$errors = [];


$repository_anexo = new RepositoryAnexo($connection);
$repository_task = new RepositoryTask($connection);

// upload dos anexos.
if (havePost()) :
    $task_id = $_POST['task_id'];

    if (!array_key_exists('anexo', $_FILES)) {
        $have_error = true;
        $errors['anexo'] = 'Você deve selecionar um arquivo para anexar';
    } else {
        if (checkAnexo($_FILES['anexo'])) {
            $name = $_FILES['anexo']['name'];

            $anexo = new Anexo();
            $anexo->setName(substr($name, 0, -4));
            $anexo->setTask_id($task_id);
            $anexo->setFile($name);

        } else {
            $have_error = true;
            $errors['anexo'] = 'Envie anexos nos formatos zip ou pdf.';
        }
    }

    if (!$have_error) {
        $repository_anexo->add($anexo);
    }
endif;

$task = $repository_task->get($_GET['id']);


include "template_task.php";
