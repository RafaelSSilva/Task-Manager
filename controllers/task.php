<?php
$have_error = false;
$errors = [];

// upload dos anexos.
if (havePost()) :
    $task_id = $_POST['task_id'];

    if (!array_key_exists('anexo', $_FILES) || $_FILES['anexo']['error'] > 0) {
        $have_error = true;
        $errors['anexo'] = 'Você deve selecionar um arquivo para anexar';
    } else {
        if (checkAnexo($_FILES['anexo'])) {
            addAnexo($_FILES['anexo'], $task_id);


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

include  __DIR__ . "/../views/template_task.php";
