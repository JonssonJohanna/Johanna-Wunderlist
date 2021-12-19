<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.


// To add users uploaded images
if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $destination = __DIR__ . '/../uploads/' . date("y-m-d") . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], $destination);
    $message = 'The file was successfully uploaded!';
}

// To add a users name, not sanitized
if (isset($_POST['name'])) {
    $name = trim($_POST['name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['profile_image'];

    // Text saying if uploaded image was succefull

    // if ($image['type'] !== 'image/png') {
    //     echo 'Ops something went wrong, perhaps the image file type is not allowed.';
    // } else {
    //     echo 'Welcome you are now a member and can start orgonizing your life!';
    // }

    $database->exec("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
    // $database->prepare("INSERT INTO users (name, email, password, profile_image) VALUES (:name, :email, :password, :profile_image)");
    // $database = $sql;

    // $sql->bindParam(':name', $name, PDO::PARAM_STR);
    // $sql->bindParam(':email', $email, PDO::PARAM_STR);
    // $sql->bindParam(':password', $password, PDO::PARAM_STR);
    // $sql->bindParam(':profile_image', $image, PDO::PARAM_STR);

    // $sql->execute();
}

// redirect('/../user/');
