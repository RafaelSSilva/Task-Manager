<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- material design -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <title>MyTasks</title>
    <!-- add favicon link -->
    <link rel = "icon" href = "assets/img/favicon.png" type = "image/x-icon"> 
</head>

<body>
    <?php
    switch ($route) {
        case 'home':
            require 'home.php';
            break;
        default;
            require 'home.php';
            break;
    }
    ?>
</body>
</html>