<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';


//connects user tasks with database

if (isset($_POST['tasks'], $_POST['deadline'], $_POST['title'])) {
    $tasks = trim(filter_var($_POST['tasks'], FILTER_SANITIZE_STRING));
    $deadline = trim(filter_var($_POST['deadline'], FILTER_SANITIZE_STRING));
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $listId = trim(filter_var($_POST['list_id'], FILTER_SANITIZE_STRING));



    $sql = $database->prepare("INSERT INTO tasks (title, description, deadline, list_id) VALUES (:title, :description, :deadline, :list_id)");
    $sql->bindParam(':description', $tasks, PDO::PARAM_STR);
    $sql->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $sql->bindParam(':title', $title, PDO::PARAM_STR);
    $sql->bindParam(':list_id', $listId, PDO::PARAM_STR);

    $sql->execute();

    $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
}

// redirect('/../../tasks.php');

// connects list.id with tasks.list_id

// if (isset($_POST['title'])) {
//     $idList = trim($_POST['title']);

//     $sql = $database->prepare("INSERT INTO lists (title, user_id) VALUES (:list, :user_id)");

//     $sql->bindParam(':', $idList, PDO::PARAM_STR);
//     $sql->bindParam(':list_id', $taskId, PDO::PARAM_STR);

//     $sql->execute();

//     $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
// }
