<div class="container-form">
    <form method="POST">
        <div class="row">
            <?php
            if ($haveError && array_key_exists('name', $listError)) : ?>
                <div class="size-100 alert-danger">
                    <span>
                        <?php echo $listError['name']; ?>
                    </span>
                </div>
            <?php
            endif;
            ?>

            <input id="name" name="name" type="text" placeholder="Tarefa" value="<?php echo htmlentities($task->getName()); ?>">
        </div>

        <div class="row">
            <?php
            if ($haveError && array_key_exists('term', $listError)) : ?>
                <div class="alert-danger">
                    <span class="alert-danger">
                        <?php echo $listError['term']; ?>
                    </span>
                </div>
            <?php endif; ?>

            <input id="term" name="term" type="date" placeholder="Prazo" value="<?php echo $task->getTerm() != null ? $task->getTerm() : ''; ?>">
        </div>

        <div class="row">
            <label for="priority">Prioridade:</label>

            <input name="priority" type="radio" value="1" <?php echo ($task->getPriority() == 1) ? 'checked' : ''; ?>>
            <label for="priority1">Baixa</label>

            <input name="priority" type="radio" value="2" <?php echo ($task->getPriority() == 2) ? 'checked' : ''; ?>>
            <label for="priority">Média</label>

            <input name="priority" type="radio" <?php echo ($task->getPriority() == 3) ? 'checked' : ''; ?>>
            <label for="priority">Alta</label>
        </div>

        <div class="row">
            <label for="high">Tarefa concluída:</label>
            <input name="high" type="checkbox" value="1" <?php echo ($task->getHigh() == 1) ? 'checked' : ''; ?>>
        </div>

        <div class="row">
            <label for="email-task">Lembrete por e-mail:</label>
            <input name="email-task" type="checkbox" value="1">
        </div>

        <div class="row">
            <textarea id="description" name="description" rows="10" placeholder="Descrição" ><?php echo htmlentities($task->getDescription()); ?></textarea>
        </div>

        <div class="row">
            <div class="size-100">
                <input type="submit" value="Enviar">
            </div>
        </div>
    </form>
</div>