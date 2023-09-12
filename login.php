<?php

require 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $conn = require 'includes/db.php';

    if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {

        Auth::login();

        Url::redirect('/');
    } else {
        $error = 'password or username incorrect';
    }
}

?>

<?php require 'includes/header.php'; ?>

<h2>Login</h2>

<?php if (!empty($error)) : ?>
    <p><?= $error ?></p>
<?php endif ?>

<form method="post">
    <div class="input-group mb-3">
        <label class="input-group-text" for="username">Username</label>
        <input class="form-control" name='username' id="username">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password">
    </div>

    <button class="btn btn-primary">Login</button>
</form>

<?php require 'includes/footer.php'; ?>