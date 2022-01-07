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

// function that fetch tasks and allows to display them
function collectTasks(PDO $database, int $listId): array
{
    $sql = $database->prepare('SELECT * FROM tasks WHERE list_id = :id');
    $sql->bindParam(':id', $listId, PDO::PARAM_INT);
    $sql->execute();
    $tasks =  $sql->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}

// functions that connects tasks with lists to display all tasks that should be completed today
function fetchTasksToday(PDO $database, $deadline): array
{
    $sql = $database->prepare('SELECT * FROM tasks WHERE deadline = :deadline AND id = :list_id');
    $sql->bindParam(':id', $deadline, PDO::PARAM_INT);
    $sql->execute();

    $tasksToday = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $tasksToday;
}
