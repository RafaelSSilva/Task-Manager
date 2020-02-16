<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/tasks.css">

    <title>Gerenciador de Tarefas!</title>
</head>

<body>
    <div class="container">
        <h1>Gerenciador de Tarefas</h1>

        <form>
            <div class="form-group">
                <label for="name">Tarefa</label>
                <input id="name" name="name" class="form-control" type="text" placeholder="Tarefa">
            </div>


            <div class="form-group">
                <label for="description">Descrição (Opcional)</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="term">Prazo (Opcional)</label>
                <input id="term" name="term" class="form-control" type="text" placeholder="Prazo" checked>
            </div>

            <div class="form-group">
                <label for="priority">Prioridade</label>

                <div class="form-check">
                    <input name="priority" type="radio" value="baixa" checked class="form-check-input">
                    <label class="form-check-label" for="priority1">Baixa</label>
                </div>

                <div class="form-check">
                    <input name="priority" type="radio" value="media" class="form-check-input">
                    <label class="form-check-label" for="priority">Média</label>
                </div>

                <div class="form-check">
                    <input name="priority" type="radio" value="alta" class="form-check-input">
                    <label class="form-check-label" for="priority">Alta</label>
                </div>
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input name="high" type="checkbox" value="alta" class="form-check-input">
                    <label class="form-check-label" for="high">
                        Tarefa concluída
                    </label>
                </div>
            </div>


            <div class="text-right">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>

        <br>

        <table class="table">
            <thead>
                <td>Tarefas</td>
                <td>Descricao</td>
                <td>Prazo</td>
                <td>Prioridade</td>
            </thead>

            <?php foreach ($list_tasks as $task) : ?>
                <tr>
                    <td><?php echo $task['name'];?></td>
                    <td><?php echo $task['description'];?></td>
                    <td><?php echo $task['term'];?></td>
                    <td><?php echo $task['priority'];?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>