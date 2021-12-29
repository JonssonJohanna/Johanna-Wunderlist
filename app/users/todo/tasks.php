<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';


//connects user tasks with database

if (isset($_POST['tasks'], $_POST['deadline'], $_POST['title'])) {
    $tasks = trim(filter_var($_POST['tasks'], FILTER_SANITIZE_STRING));
    $deadline = trim(filter_var($_POST['deadline'], FILTER_SANITIZE_STRING));
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));

    $sql = $database->prepare("INSERT INTO tasks (title, description, deadline) VALUES (:title, :description, :deadline)");
    $sql->bindParam(':description', $tasks, PDO::PARAM_STR);
    $sql->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $sql->bindParam(':title', $title, PDO::PARAM_STR);


    $sql->execute();

    $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
}

redirect('/../../tasks.php');

//  Show tasks from database and show in browser
// if (isset($_SESSION['user']['id'])) {
//     $_SESSION['user']['id'];

//     $sql = $database->prepare("SELECT *  from title");
//     $sql->bindParam(':id, $getTasks', PDO::PARAM_INT);

//     $sql->execute();

//     $sql->fetchAll(PDO::FETCH_ASSOC);
//     $sql->execute();
// };
