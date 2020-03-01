<table class="table">
    <thead>
        <td>Tarefas</td>
        <td>Descricao</td>
        <td>Prazo</td>
        <td>Prioridade</td>
        <td>Concluida</td>
        <td>Opções</td>
    </thead>

    <?php foreach ($list_tasks as $task) : ?>
        <tr>
            <td><?php echo $task['name']; ?></td>
            <td><?php echo $task['description']; ?></td>
            <td><?php echo translateDateShow($task['term']); ?></td>
            <td><?php echo translatesPriority($task['priority']); ?></td>
            <td><?php echo translateHigh($task['high']); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $task['id']; ?>">Editar</a>
                <a href="remove.php?id=<?php echo $task['id']?>">Remover</a>
            </td>

        </tr>
    <?php endforeach; ?>
</table>