<?php 
    $anexo = $repository_anexo->get($_GET['id']);
    $repository_anexo->remove($anexo->getId());
    removeAnexo($anexo->getTask_id(), $anexo->getFile());
    header('location: index.php?route=task&id=' . $anexo->getTask_id());
?>