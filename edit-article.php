<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $article = Article::getByID($conn, $id);

    if (!$article) {
        die('article not found');
    }
} else {
    // $article = null;
    die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    if ($article->update($conn)) {
        Url::redirect("/article.php?id={$article->id}");
    }
}
?>

<?php require 'includes/header.php'; ?>
<a href="/article.php?id=<?= $id ?>">Return</a>

<h2>Edit article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>