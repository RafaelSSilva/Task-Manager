<?php
    $taskId = array_key_exists('id', $_GET) ? (int) $_GET['id'] : 0;
    
    if($taskId > 0){
        $task = $repository_task->get($taskId);
        $anexos = $task->getAnexos();
        
        // duplica tarefa
        $repository_task->add($task);
        $task->setId($repository_task->getPdo()->lastInsertId());
        
        // duplica anexos
        foreach($anexos as $anexo){
            $anexo->setTask_id($task->getId());    
            $repository_anexo->add($anexo);
        }

        // copia os arquivos para a tarefa duplicada.
        $folder = __DIR__ . "/../anexos/{$taskId}";

        if(is_dir($folder)){
            $diretory = dir($folder);
            $source = __DIR__ . "/../anexos/{$taskId}";
            $dest = __DIR__ . "/../anexos/{$task->getId()}";
            mkdir($dest);
        
            while($file = $diretory->read()){
                if($file != '.' && $file != '..'){
                    copy("{$source}/{$file}", "$dest/{$file}");
                }
            }
            
            $diretory->close();
        }
    }
    
    header('location: index.php?route=tasks');
    die();
