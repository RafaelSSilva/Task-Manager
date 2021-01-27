<?php
    // inicia sessão
    session_start();
    
    //incluir as configurações, ajudantes e classes.
    require "config.php";
    require "helpers/database.php";
    require "helpers/helpers.php";
    require "helpers/authentication.php";
    require "models/task.php";
    require "models/repository_task.php";
    require "models/anexo.php";
    require "models/repository_anexo.php";
    require "models/user.php";

    // criar um objeto da classe repositorio tarefas e repositorio anexo.
    $repository_task = new RepositoryTask($pdo);
    $repository_anexo = new RepositoryAnexo($pdo);

    // verifica se o usuário tá logado.
    $auth = new Authentication($pdo);
    $logged = $auth->is_logged();
    
    // verifica se o usuário tá logado e determina a rota da requisição.
    if((!$logged && !array_key_exists('route', $_GET)) || (!$logged && array_key_exists('route', $_GET) && is_file("controllers/private/{$_GET['route']}.php"))){
        $route = 'login';
        require "controllers/public/{$route}.php";
    } 

    if(!$logged && array_key_exists('route', $_GET) && is_file("controllers/public/{$_GET['route']}.php")){
        $route = (string) $_GET['route'];
        require "controllers/public/{$route}.php";
    }

    // if(!$logged && array_key_exists('route', $_GET && is_file("controllers/private/{$_GET['route']}.php"))){

    // }
    
    if($logged && !array_key_exists('route', $_GET)){
        $route = 'home';
        require "controllers/private/{$route}.php";
    }

    if($logged && array_key_exists('route', $_GET) && file("controllers/private/{$_GET['route']}.php")){
        $route = (string) $_GET['route'];
        require "controllers/private/{$route}.php";
    }

    // if(!$logged && array_key_exists('route', $_GET) && file(require "controllers/public/{$_GET['route']}.php")){
    //     $route = (string) $_GET['route'];
    //     require "controllers/public/{$route}.php";
    // }

    // if(($logged && array_key_exists('route', $_GET) && !file(require "controllers/private/{$_GET['route']}.php"))
    //     || (!$logged && array_key_exists('route', $_GET) && !file(require "controllers/public/{$_GET['route']}.php")))
    //     $route = 'not_found';
    //     // require "controllers/public/{$route}.php";
    // }

    
    
    // if($Logged){
    //     //verificar qual arquivo(rota) deve ser usado para tratar requisição.
    //     $route = (array_key_exists('route', $_GET)) && (is_file("controllers/private/{$_GET['route']}.php")) ? (string) $_GET['route'] : 'home';
    //     require "controllers/private/{$route}.php";
    // }else{
    //     //verificar qual arquivo(rota) deve ser usado para tratar requisição.
    //     $route = (array_key_exists('route', $_GET)) && (is_file("controllers/public/{$_GET['route']}.php")) ? (string) $_GET['route'] : 'login';
    //     require "controllers/public/{$route}.php";
    // }

    // header('Location: index.php?route=tasks');
    //incluir o arquivo que vai tratar a requisição
    // if(is_file("controllers/{$route}.php")){
    //     require "controllers/{$route}.php";
    // }else{
    //     print "Rota não encontrada.";
    // }