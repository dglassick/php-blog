<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $article = Article::getWithCategories($conn, $id, true);
} else {
    $article = null;
}

?>
<?php require 'includes/header.php' ?>
<?php if ($article) : ?>
    <article>
        <h2><?= htmlspecialchars($article[0]['title']); ?></h2>
        <time datetime="<?= $article[0]['published_at'] ?>">
            <?php
            $dateTime = new DateTime($article[0]['published_at']);
            echo $dateTime->format("j F, Y");
            ?>
        </time>
        <?php if ($article[0]['category_name']) : ?>
            <p>Categories:
                <?php foreach ($article as $a) : ?>
                    <?= htmlspecialchars($a['category_name']); ?>
                <?php endforeach ?>
            </p>
        <?php endif ?>

        <?php if ($article[0]['image_file']) : ?>
            <img src="/uploads/<?= $article[0]['image_file'] ?>" alt="blog image">
        <?php endif ?>
        <p><?= htmlspecialchars($article[0]['content']); ?></p>
    </article>
<?php else : ?>
    <p>No articles found.</p>

<?php endif; ?>
<?php require 'includes/footer.php' ?>