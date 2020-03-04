<?php
    require "database.php";
    require "helpers.php";

    $have_error = false;
    $errors = [];

    if(havePost()){
        // upload dos anexos.
    }

    $task = getTask($connection, $_GET['id']);

   include "template_task.php";

?>