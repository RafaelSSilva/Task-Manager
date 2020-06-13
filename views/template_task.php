<div class="container-task">
    <h3>Tarefa: <?php print htmlentities($task->getName()); ?></h3>

    <article>
        <p>
            <strong>Concluída:</strong>
            <?php print  translateHigh($task->getHigh()); ?>
        </p>

        <p>
            <strong>Descrição:</strong>
            <?php print nl2br(htmlentities($task->getDescription())); ?>
        </p>

        <p>
            <strong>Prazo:</strong>
            <?php print translateDateShow($task->getTerm()); ?>
        </p>

        <p>
            <strong>Prioridade:</strong>
            <?php print translatesPriority($task->getPriority()); ?>
        </p>
    </article>

    <!-- lista de anexos -->
    <h3>Anexos</h3>

    <!-- lista de anexos -->
    <?php
    if (count($task->getAnexos()) > 0) : ?>
        <table>
            <thead>
                <td>Arquivo</td>
                <td>Opção</td>
            </thead>

            <?php foreach ($task->getAnexos() as $anexo) : ?>
                <tr>
                    <td><?php print htmlentities($anexo->getName()); ?></td>
                    <td>
                        <a href="anexos/<?php print $anexo->getTask_id() . '/' . $anexo->getFile(); ?>"><i class="material-icons md-24 color-black">cloud_download</i></a>
                        <a href="index.php?route=remove_anexo&id=<?php print $anexo->getId(); ?>"><i class="material-icons md-24 color-red">delete</i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>Não há anexos para esta tarefa.</p>
    <?php endif; ?>

    <!-- formulário para um novo anexo -->
    <h3>Novo Anexo</h3>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="task_id" value="<?php print $task->getId(); ?>">

        <div class="row">
            <input type="file" id="anexo" name="anexo">
        </div>

        <?php if ($have_error && array_key_exists('anexo', $errors)) : ?>
            <div class="row">
                <span class="alert-danger">
                    <?php print $errors['anexo']; ?>
                </span>
            </div>
        <?php endif; ?>


        <div class="row">
            <input type="submit" value="cadastrar">
        </div>
    </form>
</div>