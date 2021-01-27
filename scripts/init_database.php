<?php
    include '../config.php';
    include '../helpers/database.php';

    echo "[",date('d/m/Y H:i'),"]"," SUCCESS: Conexão ao banco estabelecida.".PHP_EOL;

    try{
        $table = "users";
        $sql = "SHOW TABLES LIKE :table";
        $query = $pdo->prepare($sql);
        $query->execute(['table' => $table]);

        if ($query->rowCount() == 0){
            $sql = "CREATE TABLE users(
                 id        INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                 name      VARCHAR(255) NOT NULL,
                 last_name VARCHAR(255) NOT NULL,
                 email     VARCHAR(255) UNIQUE NOT NULL,
                 password  VARCHAR(255) NOT NULL
            );";

            $query = $pdo->prepare($sql);
            $query->execute();

            echo "[",date('d/m/Y H:i'),"]"," SUCCESS: Tabela Users criada.".PHP_EOL;
        }else{
            echo "[",date('d/m/Y H:i'),"]"," WARNING: Tabela Users Já existe.".PHP_EOL;
        }
    }catch(PDOException $e){
        echo "[",date('d/m/Y H:i'),"]"," ERROR: Tabela Users não foi criada. ", $e->getMessage().PHP_EOL;
    }

    try{
        $datas = [
            'login' => LOGIN_DEFAULT,
            'email' => EMAIL_DEFAULT
        ];
        
        $sql = "SELECT * FROM users WHERE login = :login OR email= :email";
        $query = $pdo->prepare($sql);
        $query->execute($datas); 

        if($query->rowCount() == 0){
            $user = [
                'name'      => 'adm',
                'last_name' => '',
                'email'     => 'rafael.ssilva03@gmail.com',
                'password'  => md5('123456'),
            ];

            $sql = "INSERT INTO users 
            (name, last_name, email, login, password)
            VALUES (:name, :last_name, :email, :login, :password)";
            $query = $pdo->prepare($sql);
            $query->execute($user);
            echo "[",date('d/m/Y H:i'),"]"," SUCCESS: Usuário adm criado.".PHP_EOL;
        }else{
            echo "[",date('d/m/Y H:i'),"]"," WARNING: Usuário adm já existe.".PHP_EOL;
        }
    }catch(PDOException $e){
        echo "[",date('d/m/Y H:i'),"]"," ERROR: Usuário adm não foi criado. ", $e->getMessage().PHP_EOL;
    }

    echo "[",date('d/m/Y H:i'),"]"," Programa Encerrado.".PHP_EOL;
?>