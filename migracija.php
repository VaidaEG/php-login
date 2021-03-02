<?php
// vienkartinis, naudojamas pirma karta uzpildyti duomenim
$users = [
    ['name' => 'Petras', 'surname' => 'Lapinskas', 'pass' => password_hash('123', PASSWORD_DEFAULT)],
    ['name' => 'Ona', 'surname' => 'Lapinskienė', 'pass' => password_hash('123', PASSWORD_DEFAULT)],
    ['name' => 'Sūnus', 'surname' => 'Saulius', 'pass' => password_hash('123', PASSWORD_DEFAULT)],
];
file_put_contents(__DIR__ . '/users.json', json_encode($users));

?>