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
        <div class="tableContainer">
            <table class="table">


                <tr class="columnName">
                    <th class="column"> <?= $list['title']; ?>
                        <div>
                            <form action="/updateLists.php" method="POST">
                                <input type="hidden" name="id" value="<?= $list['id'] ?>" />
                                <input type="image" src="/images/editPen.png">

                            </form>
                        </div>
                    </th>
                    <th class="column">Completed</th>
                    <th class="column">Title</th>
                    <th class="column">Description</th>
                    <th class="column">Date</th>
                    <th class="column">Edit</th>
                    <th class="column">Delete task</th>
                </tr>

                <!-- Functions that loops out tasks -->
                <?php $tasks = collectTasks($database, $list['id']);  ?>
                <?php foreach ($tasks as $taskItem) : ?>
                    <tr>
                        <td class="list"><?= $list['title']; ?></td>
                        <!-- Form for submiting task as completed -->
                        <td>
                            <form action="/app/tasks/update.php" method="POST" name="taskBox<?= $taskItem['id'] ?>">
                                <input type="hidden" name="id" value="<?= $taskItem['id'] ?>" />
                                <input type="checkbox" name="checkBoxes" onclick="document.forms.taskBox<?= $taskItem['id'] ?>.submit();">
                                <?php if ($taskItem['completed'] == 1) {
                                    echo "Done";
                                } elseif ($taskItem['completed'] != 1) {
                                    echo "Not done";
                                } ?>
                                <!-- <button type="submit" name="saveCheckBox">Completed task</button> -->
                            </form>
                        </td>
                        <td><?= $taskItem['title']; ?></td>
                        <td><?= $taskItem['description']; ?></td>
                        <td><?= $taskItem['deadline']; ?></td>
                        <td>
                            <!-- Connects task with its id -->
                            <div>
                                <form action="/updateTasks.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $taskItem['id'] ?>" />
                                    <button type="submit"></button>
                                </form>
                            </div>
                        </td>
                        <td class="delete">
                            <div>
                                <form action="/app/tasks/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $taskItem['id'] ?>" />
                                    <button type="submit"></button>
                                </form>
                            </div>
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
