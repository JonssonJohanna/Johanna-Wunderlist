<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// checkboxes

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $isCompleted = isset($_POST['completed']);

    if ($isCompleted) {
        $taskBox = 1;
    } else {
        $taskBox = 0;
    }

    $insertSQL = ("UPDATE tasks SET completed = :completed WHERE id = :id");
    $sql = $database->prepare($insertSQL);
    $sql->bindParam(':completed', $taskBox, PDO::PARAM_BOOL);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    // $_SESSION['user'][] = $sql->fetch(PDO::FETCH_ASSOC);
}

redirect('/../../index.php');
