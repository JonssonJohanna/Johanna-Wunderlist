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
// "UPDATE users SET profile_image = :profile_image WHERE id = :id"

// SELECT column_name(s)
// FROM table1
// INNER JOIN table2
// ON table1.column_name = table2.column_name;
