<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';

if (isset($_POST['newPassword'])) {
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);;

    $insertSql = ("UPDATE users SET password = :password WHERE id = :id;");
    $sql = $database->prepare($insertSql);
    $sql->bindParam(':password', $newPassword, PDO::PARAM_STR);
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    // $sql->execute();
    // $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();

    $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);

    // ett meddelande som skrivs ut i den andra edit.php ifall man har bytt e-post, om SESSION emailMessage isset.
    $_SESSION['messagePassword'] = "You have succsessfully changed your password";

    if ($newPassword !== $confirmNewPassword) {
        $_SESSION['messageError'] = "Passwords does not match";
        header("Location: /../../profile.php");
        exit;
    }
};



redirect('/profile.php');
