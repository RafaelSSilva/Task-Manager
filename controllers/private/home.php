
<?php
//pagination
// $totalTasks = $repository_task->countTasks();
// $limitTasks = 15;
// $totalPages = ceil($totalTasks / $limitTasks);
// $page = (isset($_GET['page']) && $_GET['page'] > 1 &&  $_GET['page'] <= $totalPages) ? (int) $_GET['page'] : 1;
// $start = ($page * $limitTasks) - $limitTasks;
// $indexes = createIndixesPagination($page, $totalPages);

// get tasks
// $list_tasks = [];
// $list_tasks = $repository_task->getTasksPagination($start, $limitTasks);

require  __DIR__ .  "/../../views/template.php";
?>



