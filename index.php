<?php
require __DIR__ . '/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
<h1>Hello page</h1>
    <button><a href="<?= URL ?>login.php">Login</a></button>
    <button><a href="<?= URL ?>private.php">Private</a></button>
</body>
</html>