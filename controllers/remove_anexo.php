<?php 
    $anexo = $repository_anexo->get($_GET['id']);
    $repository_anexo->remove($anexo->getId());
    unlink(__DIR__ . '/../anexos/' . $anexo->getFile());
    header('location: index.php?route=task&id=' . $anexo->getTask_id());
?>