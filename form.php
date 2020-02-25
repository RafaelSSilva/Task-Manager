<form>
    <div class="form-group">
        <input name="id" class="form-control" type="hidden" value="<?php echo $task['id']; ?>">
    </div>

    <div class="form-group">
        <label for="name">Tarefa</label>
        <input id="name" name="name" class="form-control" type="text" placeholder="Tarefa" value="<?php echo $task['name']; ?>">
    </div>


    <div class="form-group">
        <label for="description">Descrição (Opcional)</label>
        <textarea class="form-control" id="description" name="description"><?php echo $task['description']; ?></textarea>
    </div>

    <div class="form-group">
        <label for="term">Prazo (Opcional)</label>
        <input id="term" name="term" class="form-control" type="text" placeholder="Prazo" 
        value="<?php echo translateDateShow($task['term']); ?>">
    </div>

    <div class="form-group">
        <label for="priority">Prioridade</label>

        <div class="form-check">
            <input name="priority" type="radio" value="1" checked class="form-check-input" <?php echo ($task['priority'] == 1) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="priority1">Baixa</label>
        </div>

        <div class="form-check">
            <input name="priority" type="radio" value="2" class="form-check-input" <?php echo ($task['priority'] == 2) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="priority">Média</label>
        </div>

        <div class="form-check">
            <input name="priority" type="radio" value="3" class="form-check-input" <?php echo ($task['priority'] == 3) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="priority">Alta</label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input name="high" type="checkbox" value="1" class="form-check-input" <?php echo ($task['high'] == 1) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="high">Tarefa concluída</label>
        </div>
    </div>


    <div class="text-right">
        <button type="submit" class="btn btn-primary">
            <?php echo $task['id'] > 0 ? 'Atualizar' : 'Entrar'; ?>
        </button>
    </div>
</form>