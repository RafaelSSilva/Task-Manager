<?php
    $have_error = false;
    $user       = new User();
    $list_errors = [];


    if(havePost() > 0){
        $user->setEmail(array_key_exists('email', $_POST) ? trim($_POST['email']) : '');
        $user->setPassword(array_key_exists('password', $_POST) ? trim($_POST['password']) : '');
        

        if(strlen($user->getEmail()) <= 0 && empty($user->getEmail())){
            $have_error = true;
            $list_errors['email_empty'] = "Preencha o e-mail.";
        }

        if(strlen($user->getPassword()) <= 0 && empty($user->getPassword())){
            $have_error = true;
            $list_errors['password_empty'] = "Preencha a senha.";
        }

        if(!$have_error){
            if($auth->login($user->getEmail(), md5($user->getPassword()))){
                header('Location: index.php?route=home');
                die();
            }else{
                $have_error = true;
                $list_errors['invalid_login'] = 'Confira seu e-mail e senha e tente novamente.';                
            }
        }
    }

    require  __DIR__ .  "/../../views/template.php";
?>
