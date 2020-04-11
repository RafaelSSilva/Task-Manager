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
            <td>
                <a href="task.php?id=<?php print $task->getId(); ?>">
                    <?php print htmlentities($task->getName());?>
                </a>
            </td>
            <td><?php echo htmlentities($task->getDescription()); ?></td>
            <td><?php echo translateDateShow($task->getTerm()); ?></td>
            <td><?php echo translatesPriority($task->getPriority()); ?></td>
            <td><?php echo translateHigh($task->getHigh()); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $task->getId(); ?>">Editar</a>
                <a href="remove.php?id=<?php echo $task->getId(); ?>">Remover</a>
            </td>

        </tr>
    <?php endforeach; ?>
</table>