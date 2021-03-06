<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


//connects user tasks with database

if (isset($_POST['tasks'], $_POST['deadline'], $_POST['title'])) {
    $tasks = trim(filter_var($_POST['tasks'], FILTER_SANITIZE_STRING));
    $deadline = trim(filter_var($_POST['deadline'], FILTER_SANITIZE_STRING));
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $listId = filter_var($_POST['list_id'], FILTER_SANITIZE_NUMBER_INT);
    $userId = $_SESSION['user']['id'];




    $sql = $database->prepare("INSERT INTO tasks (title, description, deadline, list_id, user_id) VALUES (:title, :description, :deadline, :list_id, :user_id)");
    $sql->bindParam(':description', $tasks, PDO::PARAM_STR);
    $sql->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $sql->bindParam(':title', $title, PDO::PARAM_STR);
    $sql->bindParam(':list_id', $listId, PDO::PARAM_STR);
    $sql->bindParam(':user_id', $userId, PDO::PARAM_STR);

    $sql->execute();

    $_SESSION['user'][] = $sql->fetch(PDO::FETCH_ASSOC);
}

redirect('/../../create.php');
