<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// To add users uploaded images
if (isset($_FILES['profile_image'])) {
    $destination = __DIR__ . '/../../uploads/' . date("y-m-d") . $avatar;
    $avatarTemp = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($avatarTemp, $destination);
}


if (isset($_FILES['profile_image'])) {
    $avatar = trim(filter_var($_FILES['profile_image']['name'], FILTER_SANITIZE_STRING));
    $insertSQL = ("INSERT INTO users ('profile_image') VALUES (:profile_image)");
    $sql = $database->prepare($insertSQL);

    $sql->bindParam(':profile_image', $avatar, PDO::PARAM_STR);

    $sql->execute();
};



    // Text saying if uploaded image was succefull

    // if ($image['type'] !== 'image/png') {
    //     echo 'Ops something went wrong, perhaps the image file type is not allowed.';
    // } else {
    //     echo 'Welcome you are now a member and can start orgonizing your life!';
    // }
