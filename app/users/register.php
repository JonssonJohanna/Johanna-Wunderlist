<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.

// To add a users name, email, password into database
if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // validate email to ensure user to fill in an correct email

    // $sqlIte = "INSERT INTO users (name, email, password) VALUES (':name', ':email', ':password')";


    $sql = $database->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $sql->bindParam(':name', $name, PDO::PARAM_STR);
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->bindParam(':password', $password, PDO::PARAM_STR);


    // runs the email, name and password in database
    $sql->execute();
}


redirect('/index.php');
