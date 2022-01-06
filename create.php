<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>

    <h2>Create Lists</h2>
    <form action="/app/lists/create.php" method="post">
        <div class="mb-3 listForm">
            <label for="title">List name</label>
            <input class="form-control" type="name" name="title" id="title" placeholder="write list name here" required>
        </div>
        <button type="submit" name="submit">Create list</button>
    </form>
    <!-- Functions that loops out list titles -->
    <?php
    $lists = addLists($database);
    foreach ($lists as $list) : ?>
        <div>
            <table class="table">


                <tr>
                    <th class="column">Completed</th>
                    <th class="column">Lista <?= $list['title']; ?></th>
                    <th class="column">Title</th>
                    <th class="column">Description</th>
                    <th class="column">Date</th>
                    <th class="column">Edit</th>
                    <th class="column">Delete</th>
                </tr>

                <!-- Functions that loops out tasks -->
                <?php $tasks = collectTasks($database, $list['id']);  ?>
                <?php foreach ($tasks as $taskItem) : ?>
                    <tr>
                        <td> <input type="checkbox" id="completed" name="completed" value="completed">
                            <label for="completed"></label>
                        </td>
                        <td class="list"><?= $list['title']; ?></td>
                        <td><?= $taskItem['title']; ?></td>
                        <td><?= $taskItem['description']; ?></td>
                        <td><?= $taskItem['deadline']; ?></td>
                        <td>
                            <div>
                                <form action="/updateTasks.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $taskItem['id'] ?>" />
                                    <button type="submit"></button>
                                </form>
                            </div>
                        </td>
                        <td class="delete">
                            <a href="#">X</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <!-- Details and summary hides form -->
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
                        <input class="form-control" type="date" name="deadline" id="deadline">
                        <small class="form-text">Please fill in deadline for task.</small>
                    </div>

                    <input type="hidden" name="list_id" value="<?= $list['id']; ?>">
                    <button type="submit">Add new task</button>
                </form>
            </details>
        </div>

    <?php endforeach; ?>

</article>



<?php require __DIR__ . '/views/footer.php'; ?>
