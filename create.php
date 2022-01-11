<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>

    <h2>Create Lists</h2>
    <form action="/app/lists/create.php" method="post">
        <div class="mb-3 listForm">
            <label for="title"></label>
            <input class="form-control listForm" type="name" name="title" id="title" placeholder="Write list name here" required>
        </div>
        <button type="submit" name="submit">Create list</button>
    </form>

    <!-- Functions that loops out list titles -->
    <?php
    $lists = addLists($database);
    foreach ($lists as $list) : ?>

        <div class="tableContainer">

            <div class="listTitle"> <?= $list['title']; ?>
                <div>
                    <form action="/updateLists.php" method="POST">
                        <input type="hidden" name="id" value="<?= $list['id'] ?>" />
                        <input class="inputImage" type="image" src="/images/more.png" alt="icon for edit">

                    </form>
                </div>
                <div>
                    <form action="/app/lists/delete.php" method="POST">
                        <input type="hidden" name="id" value="<?= $list['id'] ?>" />
                        <input class="inputImage" type="image" src="/images/delete.png" alt="icon for delete">

                    </form>
                </div>
            </div>
            <table>
                <tr class="columnName">
                    <th class="column">Completed</th>
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
                        <td>


                            <form class="formCheckbox" action="/app/tasks/update.php" method="POST">
                                <input type="hidden" name="id" value=" <?= $taskItem['id'] ?>">

                                <input type="checkbox" name="completed" id="completed" <?= $taskItem['completed'] ? 'checked' : '' ?>>

                                <label for="completed">

                                </label>
                            </form>
                        </td>


                        <td><?= $taskItem['title']; ?></td>
                        <td><?= $taskItem['description']; ?></td>
                        <td><?= $taskItem['deadline']; ?></td>
                        <!-- Hidden form for edit tasks and onnects task with its id  -->
                        <td>

                            <form action="/updateTasks.php" method="POST">
                                <input type="hidden" name="id" value="<?= $taskItem['id'] ?>" />
                                <input class="inputImage" type="image" src="/images/more.png" alt="icon for edit">

                            </form>
                        </td>
                        <td class="delete">

                            <form action="/app/tasks/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?= $taskItem['id'] ?>" />
                                <input class="inputImage" type="image" src="/images/delete.png" alt="icon for delete">

                            </form>
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
