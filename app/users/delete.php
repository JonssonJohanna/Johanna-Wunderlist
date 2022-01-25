<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete an account.

if (isset($_POST['deleteUser'])) {
    $userId = $_SESSION['user']['id'];


    /* Deleting tasks when deleting a user */
    $statement = $database->prepare('DELETE FROM tasks WHERE user_id = :id');
    $statement->bindParam(':id', $userId, PDO::PARAM_INT);

    $statement->execute();

    /*  Deleting lists when deleting a user */

    $statement = $database->prepare('DELETE FROM lists WHERE user_id = :id');
    $statement->bindParam(':id', $userId, PDO::PARAM_INT);

    $statement->execute();

    /* Deleting user */
    $statement = $database->prepare('DELETE FROM users WHERE id = :id');
    $statement->bindParam(':id', $userId, PDO::PARAM_INT);


    $statement->execute();


    unset($_SESSION['user']);
}

redirect('/');
