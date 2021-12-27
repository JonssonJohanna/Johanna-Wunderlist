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
};

// if ($newPassword !== $confirmNewPassword) {
//     $_SESSION['messages'] = "Passwords does not match";
//     header("Location: /../../profile.php");
//     exit;
// }


redirect('/index.php');
