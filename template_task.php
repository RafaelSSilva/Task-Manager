<html>

<head>

    <meta charset="utf-8" />

    <title>Gerenciador de Tarefas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/tasks.css">
</head>


<body>
    <div class="container">
        <h1>Tarefa: <?php print $task['name']; ?></h1>

        <p>
            <a href="tasks.php">Voltar</a>
        </p>

        <p>
            <strong>Concluída:</strong>
            <?php print translateHigh($task['high']); ?>
        </p>

        <p>
            <strong>Descrição:</strong>
            <?php print nl2br($task['description']); ?>
        </p>

        <p>
            <strong>Prazo:</strong>
            <?php print translateDateShow($task['term']); ?>
        </p>

        <p>
            <strong>Prioridade:</strong>
            <?php print translatesPriority($task['priority']); ?>
        </p>

        <h2>Anexos</h2>
    </div>
</body>


</html>