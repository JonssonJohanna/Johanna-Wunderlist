<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>

    <h2>Create Lists</h2>
    <form action="/app/lists/create.php" method="post">
        <div class="mb-3 listForm">
            <label for="title">List name</label>
            <input class="form-control" type="name" name="title" id="title" placeholder="write list name here" required>
        </div>
        <button class="listsButton" type="submit" name="submit" class="btn btn-info">Create list</button>
    </form>
    <?php
    $lists = addLists($database);
    foreach ($lists as $list) : ?>

        <div>
            <table class="table">

                <tr>
                    <th class="column">List</th>
                    <th class="column">Title</th>
                    <th class="column">Description</th>
                    <th class="column">Date</th>
                    <th class="column">Edit</th>
                    <th class="column">Delete</th>
                </tr>
                <!-- <div> <?= $list['title']; ?></div> -->

                <?php $tasks = collectTasks($database, $list['id']);  ?>
                <?php foreach ($tasks as $taskItem) : ?>
                    <tr>
                        <td class="list"><?= $list['title']; ?></td>
                        <td><?= $taskItem['title']; ?></td>
                        <td><?= $taskItem['description']; ?></td>
                        <td><?= $taskItem['deadline']; ?></td>
                        <td input="checkbox"></td>
                        <td class="delete">
                            <a href="#">X</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <details>
                <summary>Press for task form</summary>
                <form action="/app/tasks/create.php" method="post">
                    <div class="mb-3">
                        <label for="title">Tasks</label>
                        <input class="form-control" type="name" name="title" id="title" placeholder="write task title here" required>
                        <small class="form-text">Please fill in your task name.</small>
                    </div>
                    <div class="mb-3">
                        <label for="tasks">Description</label>
                        <input class="form-control" type="tasks" name="tasks" id="tasks" placeholder="write tasks here" required>
                        <small class="form-text">Describe your task.</small>
                    </div>
                    <div class="mb-3">
                        <label for="deadline">Deadline</label>
                        <input class="form-control" type="date" name="deadline" id="deadline" placeholder="write ">
                        <small class="form-text">Please fill in deadline for task.</small>
                    </div>

                    <input type="hidden" name="list_id" value="<?= $list['id']; ?>">
                    <button class="tasksButton" type="submit" class="btn btn-warning">Add new task</button>
                </form>
            </details>
        </div>

    <?php endforeach; ?>

</article>



<?php require __DIR__ . '/views/footer.php'; ?>
