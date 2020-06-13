<!-- container -->
<div class="container-tasks">
    <?php foreach ($list_tasks as $task) : ?>
        <div class="box-task">
            <ul>
                <li>
                    <a href="index.php?route=duplicate_task&id=<?php echo $task->getId(); ?>"><i class="material-icons color-black">control_point</i></a>
                </li>
                <li>
                    <a href="index.php?route=edit_task&id=<?php echo $task->getId(); ?>"><i class="material-icons color-black">edit</i></a>
                </li>
                <li>
                    <a href="index.php?route=remove_task&id=<?php echo $task->getId(); ?>"><i class="material-icons color-red">delete</i></a>
                </li>
            </ul>

            <h3>
                <a href="index.php?route=task&id=<?php print $task->getId(); ?>">
                    <?php print htmlentities($task->getName()); ?>
                </a>
            </h3>

            <div class="content">
                <div class="content-item">
                    <?php
                    if (!is_null($task->getTerm()) && strlen($task->getTerm()) > 0) : ?>
                        <strong><?php echo translateDateShow($task->getTerm()); ?></strong>
                        <br>
                    <?php endif ?>
                    <strong><?php echo translatesPriority($task->getPriority()); ?> </strong>
                </div>
                <div class="content-item">
                    <?php echo translateHighIcon($task->getHigh()) ?>
                </div>
            </div>
        </div>
    <?php
    endforeach
    ?>
</div>

<!-- Pagination -->
<?php
if (count($indexes) > 1) : ?>
    <nav class="pagination">
        <ul>
            <li>
                <?php
                if ($page == 1) : ?>
                    <a class="pagination-item-disabled">
                        <i class="material-icons md-14">chevron_left</i>
                    </a>
                <?php
                else : ?>
                    <a class="pagination-item" href="index.php?route=tasks&page=<?php print $page - 1; ?>">
                        <i class="material-icons md-14">chevron_left</i>
                    </a>
                <?php
                endif;
                ?>
            </li>

            <?php
            for ($i = 0; $i < count($indexes); $i++) :
                if ($indexes[$i] == $page) : ?>
                    <li>
                        <a class="pagination-item-selected" href="index.php?route=tasks&page=<?php print getNextValuePagination($indexes[$i], $page); ?>">
                            <?php print getValuePagination($indexes[$i]); ?>
                        </a>
                    </li>
                <?php
                else : ?>
                    <li>
                        <a class="pagination-item" href="index.php?route=tasks&page=<?php print getNextValuePagination($indexes[$i], $page); ?>">
                            <?php print getValuePagination($indexes[$i]); ?>
                        </a>
                    </li>
            <?php
                endif;
            endfor;
            ?>

            <?php
            if ($page == $totalPages) : ?>
                <li>
                    <a class="pagination-item-disabled">
                        <i class="material-icons md-14">chevron_right</i>
                    </a>
                </li>
            <?php
            else : ?>
                <li>
                    <a class="pagination-item" href="index.php?route=tasks&page=<?php print $page + 1; ?>">
                        <i class="material-icons md-14">chevron_right</i>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
<?php endif; ?>


