<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>MyTasks</title>
    <!-- add favicon link -->
    <link rel = "icon" href = "assets/img/favicon.png" type = "image/x-icon"> 
</head>

<body>
    <?php if ($logged) : ?>
        <aside id="sidebar">
            <nav>
                <div class="header-sidebar">
                    <a href="index.php?route=home">
                        <img class="icon-sidebar" src="assets/img/logo.png" alt="Logo">
                        <span>MyTasks</span>
                    </a>
                </div>

                <ul class="body-sidebar">
                    <li>
                        <a href="index.php?route=home">
                            <img class="icon-sidebar" src="assets/img/home.png" alt="Home">
                            <span>Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img class="icon-sidebar" src="assets/img/list.png" alt="Minhas tarefas">
                            <span>Minhas tarefas</span>
                        </a>
                    </li> 

                    <li>
                        <a href="#">
                            <img class="icon-sidebar" src="assets/img/calendar.png" alt="Calendário">
                            <span>Calendário</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img class="icon-sidebar" src="assets/img/upload.png" alt="Meus arquivos">
                            <span>Meus Arquivos</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img class="icon-sidebar" src="assets/img/customize.png" alt="Personalizar">
                            <span>Personalizar</span>
                        </a>
                    </li>
                </ul>

                <ul class="min-body-sidebar">
                    <li>
                        <a href="index.php?route=home">
                            <img class="icon-sidebar" src="assets/img/home.png" alt="Home">
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img class="icon-sidebar" src="assets/img/list.png" alt="Minhas tarefas">
                        </a>
                    </li> 

                    <li>
                        <a href="#">
                            <img class="icon-sidebar" src="assets/img/calendar.png" alt="Calendário">
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img class="icon-sidebar" src="assets/img/upload.png" alt="Meus arquivos">
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <img class="icon-sidebar" src="assets/img/customize.png" alt="Personalizar">
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="container">
            The standard Lorem Ipsum passage, used since the 1500s
        </div>
    <?php 
    else: 
        require __DIR__ . "/public/{$route}.php";
    endif; 
    ?>
</body>
</html>