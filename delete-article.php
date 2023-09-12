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
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($article->delete($conn)) {

        Url::redirect("/index.php");
    }
}
?>

<?php require 'includes/header.php'; ?>

<h2>Delete Article</h2>

<form method="post">
    <p>Are you sure?</p>
    <button>Delete</button>
    <a href="article.php?id=<?= $article->id ?>">Cancel</a>
</form>

<?php require 'includes/footer.php'; ?>