<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css">

    <!-- material design -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Gerenciador de Tarefas!</title>
</head>

<body>
    <!-- barra de menu -->
    <header>
        <nav class="menu">
            <ul>
                <li>
                    <a href="index.php?route=tasks"><i class="material-icons  color-black md-30">home</i></a>
                </li>
                <li>
                    <a href="index.php?route=add_task"><i class="material-icons color-black md-30">add</i></a>
                </li>
            </ul>
        </nav>
    </header>


    <?php
    switch ($route) {
        case 'add_task':
        case 'edit_task':
            require 'form.php';
            break;
        case 'task':
            require 'template_task.php';
            break;
        default;
            require 'tasks.php';
            break;
    }
    ?>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>