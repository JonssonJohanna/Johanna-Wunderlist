<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

// Logic for users to update password

if (isset($_POST['newPassword'])) {
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

    // Error messages

    if ($_POST['newPassword'] !== $_POST['confirmNewPassword']) {
        $_SESSION['messageError'] = "Passwords do not match";
        redirect("/update.php");
    }

    if (strlen($newPassword) < 16) {
        $_SESSION['messageError'] = "Password must be at least 16 characters long";
        redirect("/update.php");
    }


    $insertSql = ("UPDATE users SET password = :password WHERE id = :id");

    $sql = $database->prepare($insertSql);

    $sql->bindParam(':password', $newPassword, PDO::PARAM_STR);

    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);


    $sql->execute();

    $_SESSION['messagePassword'] = "You have succsessfully changed your password";
}


redirect('/update.php');
