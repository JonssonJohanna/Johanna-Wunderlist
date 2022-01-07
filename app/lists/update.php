<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $listID = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);


    $sql = $database->prepare("UPDATE lists SET title = :title WHERE id = :id");
    $sql->bindParam(':title', $title, PDO::PARAM_STR);
    $sql->bindParam(':id', $listID, PDO::PARAM_INT);

    $sql->execute();

    $_SESSION['user'][] = $sql->fetch(PDO::FETCH_ASSOC);
}

redirect('/../../create.php');
