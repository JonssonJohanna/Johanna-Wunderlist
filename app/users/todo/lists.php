<?php

declare(strict_types=1);

require __DIR__ . '/../../autoload.php';


//connects user tasks with database

if (isset($_POST['title'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $sql = $database->prepare("INSERT INTO lists (title, user_id) VALUES (:list, :user_id)");

    $sql->bindParam(':list', $title, PDO::PARAM_STR);
    $sql->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();

    $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
}

redirect('/../../lists.php');

//  Show tasks from database and show in browser
// if (isset($_SESSION['user']['id'])) {
//     $getTasks = $_SESSION['user']['id'];

//     $sql = $database->prepare("SELECT *  from title");
//     $sql->bindParam(':id, $getTasks', PDO::PARAM_INT);

//     $sql->execute();

//     $sql->fetchAll(PDO::FETCH_ASSOC);
//     $sql->execute();
// };
