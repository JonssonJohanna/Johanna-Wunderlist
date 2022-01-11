<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';


// Allows user to edit email

if (isset($_POST['newEmail'])) {
    $newEmail = trim(filter_var($_POST['newEmail'], FILTER_VALIDATE_EMAIL));

    $insertSql = ("UPDATE users SET email = :email WHERE id = :id;");
    $sql = $database->prepare($insertSql);
    $sql->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);


    $sql->execute();
    $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);

    $_SESSION['messageEmail'] = "You have succsessfully updated your email ";
};


redirect('/update.php');
