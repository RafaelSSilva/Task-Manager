<?php
    try{
        $pdo = new PDO(BD_DSN, BD_USER, BD_PASSWORD);
    }catch(PDOException $e){
        print 'Falha na conexão com o banco de dados: ' . $e->getMessage();
        die();
    }
