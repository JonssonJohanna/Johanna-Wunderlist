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
                        <input class="inputImage" type="image" src="/images/more.png">

                    </form>
                </div>
                <div>
                    <form action="/app/lists/delete.php" method="POST">
                        <input type="hidden" name="id" value="<?= $list['id'] ?>" />
                        <input class="inputImage" type="image" src="/images/delete.png">

                    </form>
                </div>
            </div>
            <div class="table">
                <div class="columnName">
                    <div class="column">Completed</div>
                    <div class="column">Title</div>
                    <div class="column">Description</div>
                    <div class="column">Date</div>
                    <div class="column">Edit</div>
                    <div class="column">Delete task</div>
                </div>

                <!-- Functions that loops out tasks -->
                <?php $tasks = collectTasks($database, $list['id']);  ?>
                <?php foreach ($tasks as $taskItem) : ?>
                    <div class="rowName">
                        <div class="row">

                            <form action="/app/tasks/update.php" method="POST">
                                <input type="hidden" name="id" value="" <?= $taskItem['id'] ?>>

                                <input type="checkbox" name="checkBoxes" id="checkBoxes" <?= $taskItem['id'] ? 'checked' : '' ?>>

                                <label for="checkBoxes">

                                </label>

                                <div>
                                    <button type="submit">Submit</button>
                                </div>
                            </form>



                        </div>
                        <div class="row"><?= $taskItem['title']; ?></div>
                        <div class="row"><?= $taskItem['description']; ?></div>
                        <div class="row"><?= $taskItem['deadline']; ?></div>
                        <!-- Hidden form for edit tasks and onnects task with its id  -->
                        <div class="row">
                            <div>
                                <form action="/updateTasks.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $taskItem['id'] ?>" />
                                    <input class="inputImage" type="image" src="/images/more.png">

                                </form>
                            </div>
                        </div class="row">
                        <div class="row" class="delete">
                            <div>
                                <form action="/app/tasks/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $taskItem['id'] ?>" />
                                    <input class="inputImage" type="image" src="/images/delete.png">

                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

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
