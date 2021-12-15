<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.


// To add users uploaded images
if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $destination = __DIR__ . '/../profileImages/' . date("y-m-d") . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], $destination);
    $message = 'The file was successfully uploaded!';
}

// To add a users name, not sanitized
if (isset($_POST['name'])) {
    $name = trim($_POST['name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $image = $_FILES['avatar'];

    $database = new PDO('sqlite:database.db');
    $database->exec("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
}



// redirect('/');
