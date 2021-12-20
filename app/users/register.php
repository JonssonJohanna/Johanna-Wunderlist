<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.

// To add a users name, email, password into database
if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $insertSQL = "INSERT INTO users (name, email, password) VALUES (':name', ':email', ':password')";
    $sql = $database->prepare($insertSQL);

    $sql->bindParam(':name', $name, PDO::PARAM_STR);
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->bindParam(':password', $password, PDO::PARAM_STR);

    $sql->execute();
}


redirect('/index.php');
