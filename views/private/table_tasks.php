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
                <a href="index.php?route=task&id=<?php print $task->getId(); ?>">
                    <?php print htmlentities($task->getName()); ?>
                </a>
            </td>
            <td><?php echo htmlentities($task->getDescription()); ?></td>
            <td><?php echo translateDateShow($task->getTerm()); ?></td>
            <td><?php echo translatesPriority($task->getPriority()); ?></td>
            <td><?php echo translateHighIcon($task->getHigh())?></td>
            <td>
                <a href="index.php?route=duplicate_task&id=<?php echo $task->getId(); ?>"><i class="material-icons">control_point</i></a>
                <a href="index.php?route=edit_task&id=<?php echo $task->getId(); ?>"><i class="material-icons">edit</i></a>
                <a href="index.php?route=remove_task&id=<?php echo $task->getId(); ?>"><i class="icon-trash material-icons">delete</i></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="nav-scroller">
    <nav aria-label="Navegação de página exemplo">
        <ul class="pagination justify-content-center">
            <?php
            if ($page == 1) : ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Anterior">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Anterior</span>
                    </a>
                </li>
            <?php
            else : ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?route=tasks&page=<?php print $page - 1; ?>" aria-label="Anterior">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Anterior</span>
                    </a>
                </li>
            <?php
            endif; ?>

            <?php
            for ($i = 0; $i < count($indexes); $i++) :
                if ($indexes[$i] == $page) : ?>
                    <li class="page-item active"><a class="page-link" href="index.php?route=tasks&page=<?php print getNextValuePagination($indexes[$i], $page); ?>"><?php print getValuePagination($indexes[$i]); ?></a></li>
                <?php
                else : ?>
                    <li class="page-item"><a class="page-link" href="index.php?route=tasks&page=<?php print getNextValuePagination($indexes[$i], $page); ?>"><?php print getValuePagination($indexes[$i]); ?></a></li>
            <?php
                endif;
            endfor;
            ?>


            <?php
            if ($page == $totalPages) : ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Próximo">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </li>
            <?php
            else : ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?route=tasks&page=<?php print $page + 1; ?>" aria-label="Próximo">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</div>