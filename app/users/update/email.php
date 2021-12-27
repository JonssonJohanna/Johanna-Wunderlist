<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';


//user editinig email

if (isset($_POST['newEmail'])) {
    $newEmail = trim(filter_var($_POST['newEmail'], FILTER_VALIDATE_EMAIL));

    $insertSql = ("UPDATE users SET email = :email WHERE id = :id;");
    $sql = $database->prepare($insertSql);
    $sql->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    // $sql->execute();
    // $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();
};
//else {
//     header("Location: index.php");
// }

// if (isset($_SESSION['email'])) {
//     $insertSQL = ("UPDATE users SET email = :email WHERE id = :id");
//     $sql = $database->prepare($insertSQL);
//     $sql->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);

//     $sql->execute();

//     $_SESSION['email'] = $sql->fetch(PDO::FETCH_ASSOC);
// }

redirect('/index.php');
