<?php
    //incluir as configurações, ajudantes e classes.
    require "config.php";
    require "helpers/database.php";
    require "helpers/helpers.php";
    require "models/task.php";
    require "models/repository_task.php";
    require "models/anexo.php";
    require "models/repository_anexo.php";

    // criar um objeto da classe repositorio tarefas e repositoriio anexo.
    $repository_task = new RepositoryTask($pdo);
    $repository_anexo = new RepositoryAnexo($pdo);

    //verificar qual arquivo(rota) deve ser usado para tratar requisição.
    $route = 'tasks'; //rota padrão

    if(array_key_exists('route', $_GET)){
        $route = (string) $_GET['route'];
    }

    //incluir o arquivo que vai tratar a requisição
    if(is_file("controllers/{$route}.php")){
        require "controllers/{$route}.php";
    }else{
        print "Rota não encontrada.";
    }