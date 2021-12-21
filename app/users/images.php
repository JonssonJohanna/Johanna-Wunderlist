<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// add users uploaded images in 'uploads' and in database
if (isset($_FILES['profile_image'])) {
    //saving image in filesystem
    $avatar = trim(filter_var($_FILES['profile_image']['name'], FILTER_SANITIZE_STRING));
    // $newAvatar = date("y-m-d H-i-s") . $avatar['name'];
    $destination =  __DIR__ . '/../../uploads/' . $avatar;
    $avatarTemp = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($avatarTemp, $destination);
    $alert = 'The file is uploaded';

    // Adds a row in database
    $insertSQL = ("UPDATE users SET profile_image = :profile_image WHERE id = :id");

    $sql = $database->prepare($insertSQL);

    $sql->bindParam(':profile_image', $avatar, PDO::PARAM_STR);
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->execute();
};

// Text saying if uploaded image was succefull

if ($image['type'] !== 'image/png') {
    echo 'Ops something went wrong, perhaps the image file type is not allowed.';
} else {
    echo 'Welcome you are now a member and can start orgonizing your life!';
}


redirect('/index.php');
