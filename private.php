<?php
require __DIR__ . '/bootstrap.php';
if (!isset($_SESSION['login']) || 1 != $_SESSION['login']) {
    header('Location: ' . URL . 'login.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <h1 style="margin-bottom: 45px;">Hello <?= $_SESSION['user']['name'] ?>!</h1>
    <p>This is your privite information. Please let me know about your user experience. Thank you in advance!</p>
    <button class="private"><a href="<?= URL ?>login.php?logout">LogOut</a></button>
</body>
</html>