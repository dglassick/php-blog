<?php
$base = strtok($_SERVER['REQUEST_URI'], '?');
?>

<nav class="mt-3">
    <ul class="pagination">
        <?php if ($paginator->previous) : ?>
            <li class="page-item"><a class="page-link" href="<?= $base ?>?page=<?= $paginator->previous; ?>">Previous</a></li>
        <?php else : ?>
            <span class="page-link disabled">Previous</span>
        <?php endif ?>
        <?php if ($paginator->next) : ?>
            <li class="page-item"><a class="page-link" href="<?= $base ?>?page=<?= $paginator->next; ?>">Next</a></li>
        <?php else : ?>
            <span class="page-link disabled">Next</span>
        <?php endif ?>
    </ul>
</nav>