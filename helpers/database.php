<?php
    try{
        $pdo = new PDO(BD_DSN, BD_USER, BD_PASSWORD);
    }catch(PDOException $e){
        echo "[",date('d/m/Y H:i'),"]"," Falha na conexão com o banco de dados: ",$e->getMessage().PHP_EOL;
        die();
    }
