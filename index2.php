<?php
$db_host = "localhost";
$db_name = "cms_php";
$db_user = "cms_admin";
$db_pass = ".2xbaT9-gUd/vXin";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

$connected = 'Connected successfully';
$name = "Derek";

$sql = "SELECT *
    FROM article 
    ORDER BY published_at";

$results = mysqli_query($conn, $sql);

if ($results == false) {
    echo mysqli_error($conn);
} else {
    $articles = mysqli_fetch_all($results);
    var_dump($articles);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello!</h1>
    <p>Welcome, <?php echo $name . "." ?></p>
    <?php echo $connected ? "<p>$connected</p>" : "Connection Error" ?>
</body>
</html>
