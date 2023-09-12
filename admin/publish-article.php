<?php

require '../includes/init.php';

$conn = require '../includes/db.php';

$article = Article::getByID($conn, $_POST['id']);

$published_at = $article->publish($conn);


?>

<time>
    <?= $published_at ?>
</time>