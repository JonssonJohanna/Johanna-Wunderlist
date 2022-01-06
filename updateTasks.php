<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<?php
if (isset($_POST['id'])) {
    $taskID = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $insertSQL = $database->prepare('SELECT * FROM tasks WHERE id = :id');
    $insertSQL->bindParam(':id', $taskID, PDO::PARAM_INT);
    $insertSQL->execute();
    $editTasks = $insertSQL->fetch(PDO::FETCH_ASSOC);
}

?>

<form action="/app/tasks/update.php" method="post">
    <div class="mb-3">
        <label for="title">Tasks</label>
        <input class="form-control" type="name" name="title" id="title" value="<?= $editTasks['title']; ?>" required>
        <input type="hidden" name="id" value="<?= $editTasks['id'] ?>" />

    </div>
    <div class="mb-3">
        <label for="tasks">Description</label>
        <input class="form-control" type="tasks" name="tasks" id="tasks" value="<?= $editTasks['description']; ?>" required>
        <input type="hidden" name="id" value="<?= $editTasks['id'] ?>" />
    </div>
    <div class="mb-3">
        <label for="deadline">Deadline</label>
        <input class="form-control" type="date" name="deadline" id="deadline" value="<?= $editTasks['deadline']; ?>">
        <input type="hidden" name="id" value="<?= $editTasks['id'] ?>" />
    </div>

    <button type="submit">Press to complete changes</button>
</form>
</details>
</div>
