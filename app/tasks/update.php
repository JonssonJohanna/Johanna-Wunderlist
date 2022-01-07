<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//connects user tasks with database

if (isset($_POST['tasks'], $_POST['deadline'], $_POST['title'])) {
    $tasks = trim(filter_var($_POST['tasks'], FILTER_SANITIZE_STRING));
    $deadline = trim(filter_var($_POST['deadline'], FILTER_SANITIZE_STRING));
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $taskID = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);


    $sql = $database->prepare("UPDATE tasks SET title = :title, description = :description, deadline = :deadline WHERE id = :id");
    $sql->bindParam(':description', $tasks, PDO::PARAM_STR);
    $sql->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $sql->bindParam(':title', $title, PDO::PARAM_STR);
    $sql->bindParam(':id', $taskID, PDO::PARAM_INT);

    $sql->execute();

    $_SESSION['user'][] = $sql->fetch(PDO::FETCH_ASSOC);
}
// Checks if checkbox form is checked and returns 0 for false and 1 for true
if (isset($_POST['checkBoxes'])) {
    $taskBox = 1;
} else {
    $taskBox = 0;
}
if (isset($_POST['checkBoxes'], $_POST['id'])) {
    $completed = $_POST['checkBoxes'];
    $id = $_POST['id'];
    $insertSQL = ("UPDATE tasks SET completed = :completed WHERE id = :id");
    $sql = $database->prepare($insertSQL);
    $sql->bindParam(':completed', $taskBox, PDO::PARAM_BOOL);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
}




redirect('/../../create.php');
