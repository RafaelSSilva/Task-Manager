<?php
    require "database.php";
    require "helpers.php";

    $have_error = false;
    $errors = [];

    // upload dos anexos.
    if(havePost()):
        $task_id = $_POST['task_id'];
        
        if(!array_key_exists('anexo', $_FILES)){
            $have_error = true;
            $errors['anexo'] = 'Você deve selecionar um arquivo para anexar';
        }else{
            if(checkAnexo($_FILES['anexo'])){
                $name = $_FILES['anexo']['name'];
                $anexo = [
                    'task_id' => $task_id,
                    'name' => substr($name, 0, -4),
                    'file' => $name
                ];
            }else{
                $have_error = true;
                $errors['anexo'] = 'Envie anexos nos formatos zip ou pdf.'; 
            }
        }

        if(! $have_error){
            addAnexo($connection, $anexo);
        }
    endif;

    $task = getTask($connection, $_GET['id']);
    $anexos = getAnexos($connection, $_GET['id']);

   include "template_task.php";
?>