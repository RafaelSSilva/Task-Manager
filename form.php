<form method="POST">
    <div class="form-group">
        <input name="id" class="form-control" type="hidden" value="<?php echo $task->getId(); ?>">
    </div>

    <div class="form-group">
        <label for="name">Tarefa:
            <?php if ($haveError && array_key_exists('name', $listError)) : ?>
                <span class="alert-danger">
                    <?php echo $listError['name']; ?>
                </span>
            <?php endif; ?>
        </label>
        <input id="name" name="name" class="form-control" type="text" placeholder="Tarefa" value="<?php echo htmlentities($task->getName()); ?>">
    </div>


    <div class="form-group">
        <label for="description">Descrição (Opcional)</label>
        <textarea class="form-control" id="description" name="description"><?php echo htmlentities($task->getDescription()); ?></textarea>
    </div>

    <div class="form-group">
        <label for="term">Prazo (Opcional)
            <?php
            if ($haveError && array_key_exists('term', $listError)) : ?>
                <span class="alert-danger">
                    <?php echo $listError['term']; ?>
                </span>
            <?php endif; ?>
        </label>

        <input id="term" name="term" class="form-control" type="text" placeholder="Prazo" value="<?php echo translateDateShow($task->getTerm()); ?>">
    </div>

    <div class="form-group">
        <label for="priority">Prioridade</label>

        <div class="form-check">
            <input name="priority" type="radio" value="1" checked class="form-check-input" <?php echo ($task->getPriority() == 1) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="priority1">Baixa</label>
        </div>

        <div class="form-check">
            <input name="priority" type="radio" value="2" class="form-check-input" <?php echo ($task->getPriority() == 2) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="priority">Média</label>
        </div>

        <div class="form-check">
            <input name="priority" type="radio" value="3" class="form-check-input" <?php echo ($task->getPriority() == 3) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="priority">Alta</label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input name="high" type="checkbox" value="1" class="form-check-input" <?php echo ($task->getHigh() == 1) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="email-task">Tarefa concluída</label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input name="email-task" type="checkbox" value="1" class="form-check-input">
            <label class="form-check-label" for="email-task">Lembrete por e-mail</label>
        </div>
    </div>

    <div class="text-right">
        <button type="submit" class="btn btn-primary">
            <?php echo $task->getId() > 0 ? 'Atualizar' : 'Entrar'; ?>
        </button>
    </div>
</form>