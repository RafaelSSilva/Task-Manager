<html>

<head>
    <meta charset="utf-8" />
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>


<body>
    <div class="container">
        <h1 class="text-center">Tarefa: <?php print $task['name']; ?></h1>

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
        <!-- lista de anexos -->
        <?php 
            if (count($anexos) > 0) :?>
        <table class="table">
            <thead>
                <td>Arquivo</td>
                <td>Opções</td>
            </thead>

            <?php foreach ($anexos as $anexo) : ?>
            <tr>
                <td><?php print $anexo['name']; ?></td>
                <td>
                    <a href="anexos/<?php print $anexo['file']; ?>">Download</a> 
                    <a href="remove_task.php?id=<?php print $anexo['id']; ?>">Remover</a> 
                </td>
           </tr>
            <?php endforeach; ?>
        </table>
            <?php else: ?>
                <p>Não há anexos para esta tarefa.</p>
            <?php endif; ?>

        <!-- formulário para um novo anexo -->
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Novo anexo</legend>

                <input type="hidden" name="task_id" value="<?php print $task['id']; ?>">
                
                <label>
                    <?php if($have_error && array_key_exists('anexo', $errors)): ?>
                        <span class="alert-danger">
                            <?php print $errors['anexo'];?>
                        </span>
                    <?php  endif;?>
                </label>


                <div class="form-group">
                    <input type="file" class="form-control-file" id="anexo" name="anexo">
                </div>
                
                <!-- <div class="text-right"> -->
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                <!-- </div> -->
            </fieldset>
        </form>

    </div>
</body>


</html>