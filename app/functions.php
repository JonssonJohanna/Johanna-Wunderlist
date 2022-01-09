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

// functions that displays all tasks that should be completed TODAY
function fetchTasksToday(PDO $database, string $todaysDate): array
{

    $todaysDate = time();
    $todaysDate = date("Y-m-d", $todaysDate);




    $sql = $database->prepare('SELECT * FROM tasks WHERE $todaysDate = :deadline');
    $sql->bindParam(':deadline', $todaysTasks);
    die(var_dump($todaysTasks));
    $sql->execute();

    // $todayTasks = ;
    // die(var_dump($todayTasks));
    // $sql = $database->prepare('SELECT tasks.* FROM tasks INNER JOIN lists on tasks.list_id = lists.id WHERE deadline = :deadline AND list_id = :id');
    // $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    // $sql->bindParam(':deadline', $todayTasks);
    // $sql->execute();

    $tasksDUE = $sql->fetchAll(PDO::FETCH_ASSOC);
    die(var_dump($tasksDUE));

    return $tasksDUE;
}
