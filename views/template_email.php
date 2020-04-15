<h1>Tarefa: <?php print $task->getName();?></h1>

<p>
    <strong>Concluída:</strong>
    <?php print translateHigh($task->getHigh());  ?>
</p>


<p>
    <strong>Descrição:</strong>
    <?php print nl2br($task->getDescription());  ?>
</p>

<p>
    <strong>Prazo:</strong>
    <?php checkDateTerm($task->getTerm()->format('d/m/Y')) ? print $task->getTerm()->format('d/m/Y') : print '';  ?>
</p>

<p>
    <strong>Prioridade:</strong>
    <?php print translatesPriority($task->getPriority());  ?>
</p>

<?php if (count($task->getAnexos()) > 0) : ?>
    <p><strong>Atenção!</strong>Esta tarefa contém anexos!</p>
<?php endif; ?>

<p>Tenha um bom dia!</p>