<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

// function that adds new lists and displays them

function addLists(PDO $database): array
{
    $sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);

    $sql->execute();

    $lists = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $lists;
}

// Function that fetch tasks and allows to display them
function collectTasks(PDO $database, int $listId): array
{
    $sql = $database->prepare('SELECT * FROM tasks WHERE list_id = :id');
    $sql->bindParam(':id', $listId, PDO::PARAM_INT);
    $sql->execute();
    $tasks =  $sql->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}

// Function that collects tasks in a list with deadline today
function collectTodaysTasks(PDO $database, int $userId): array
{
    $userId = $_SESSION['user']['id'];

    $todaysDate = date("Y-m-d");

    $sql = $database->prepare('SELECT * FROM tasks INNER JOIN lists ON tasks.list_id = lists.id WHERE tasks.user_id = :id AND deadline = :deadline ORDER BY deadline DESC');

    $sql->bindParam(':id', $userId, PDO::PARAM_INT);
    $sql->bindParam(':deadline', $todaysDate);
    $sql->execute();
    $todaysTasks =  $sql->fetchAll(PDO::FETCH_ASSOC);
    return $todaysTasks;
}

//Collect all lists from a specific user.
function getLists($id, $database): array
{
    $statement = $database->query('SELECT * FROM lists WHERE user_id = :user_id;');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $lists;
}
