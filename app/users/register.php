<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.
// To add a users name, email, password into database
if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['repeatPassword'])) {
    $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = $_POST['password'];

    // $repeatPassword = password_hash($_POST['repeatPassword'], PASSWORD_DEFAULT);

    if ($name === "") {
        $_SESSION['messages'] = "The name field is missing.";
        redirect("/register.php");
    }

    // validate email to ensure user to fill in an correct email

    if (strlen($password) < 16) {
        $_SESSION['messageError'] = "Password must be at least 16 characters long";
        redirect("/register.php");
    }
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = $database->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $sql->bindParam(':name', $name, PDO::PARAM_STR);
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->bindParam(':password', $password, PDO::PARAM_STR);

    $sql->execute();
}

redirect('/index.php');
