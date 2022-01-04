<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['newPassword'])) {
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $confirmNewPassword = password_hash($_POST['confirmNewPassword'], PASSWORD_DEFAULT);

    // ett meddelande som skrivs ut i den andra edit.php ifall man har bytt e-post, om SESSION emailMessage isset.

    if ($_POST['newPassword'] !== $_POST['confirmNewPassword']) {
        $_SESSION['messageError'] = "Passwords do not match";
        redirect("/profile.php");
    }

    $insertSql = ("UPDATE users SET password = :password WHERE id = :id");

    $sql = $database->prepare($insertSql);

    $sql->bindParam(':password', $newPassword, PDO::PARAM_STR);

    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);


    $sql->execute();

    $_SESSION['messagePassword'] = "You have succsessfully changed your password";

    // $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
}



redirect('/profile.php');
