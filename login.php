<?php
require __DIR__ . '/bootstrap.php';

// LOGOUT scenarijus
if (isset($_GET['logout'])) {
    // keli budai
    // $_SESSION['login'] = 0;
    // unset($_SESSION['user']);
    // kitas budas
    session_destroy();
}
// jau prisijungusio vartotojo scenarijus
if (isset($_SESSION['login']) && 1 == $_SESSION['login']) {
    header('Location: ' . URL . 'private.php');
    die;
}

// POST metodo scenarijus
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = file_get_contents(__DIR__ . '/users.json');
    $users = json_decode($users, 1);

    $postName = $_POST['name'] ?? '';
    $postPass = $_POST['pass'] ?? '';

    foreach ($users as $user) {
        if ($postName == $user['name']) { // <--- turim useri
            if (password_verify($postPass, $user['pass'])) { // <--- viskas ok
                // sugalvojame, kad 1 reiks prisijungusi vartotoja, o 0 reiks neprisijungusi vartotoja
                $_SESSION['login'] = 1;
                $_SESSION['user'] = $user;
                header('Location: ' . URL . 'private.php');
                die;
            }
        }
    }
    $_SESSION['error_msg'] = 'Password or Name is invalid.';
    header('Location: ' . URL . 'login.php');
    die;
}

// Prisijungimo formos atvaizdavimo scenarijus


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
    <!-- tikrinam ar yra pranesimas -->
    <?php if (isset($_SESSION['error_msg'])): ?>
    <!-- pranesimas yra atvaizduojamas -->
    <h3 style="color: red; margin-top: 10px;"><?= $_SESSION['error_msg'] ?></h3>
    <!-- atvaizdavome, nereikalinga istriname -->
    <?php unset($_SESSION['error_msg']) ?>
    <?php endif ?>
    <form action="<?= URL ?>login.php" method="post">
        <h1>Login page</h1>
        <img class="mb-4" src="./img/logo.JPG" alt="" width="72" height="57">
        NAME:<input type="text" name="name">
        PASSWORD:<input type="password" name="pass">
        <button type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
</body>
</html>