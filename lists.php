<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>

    <h2>Create Lists</h2>
    <form action="/app/users/todo/lists.php" method="post">
        <div class="mb-3 listForm">
            <label for="title">List name</label>
            <input class="form-control" type="name" name="title" id="title" placeholder="write list name here" required>
        </div>
        <button type="submit" name="submit" class="btn btn-info">Create list</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>List</th>
                <th>Add task</th>
            </tr>
        </thead>

        <tbody>
            <tr class="displayLists">
                <?php
                $lists = addLists($database);
                foreach ($lists as $list) :

                ?>
                    <td>

                        <?= $list['title']; ?>

                    </td>

                    <td><button class="taskButton">Create task</button></td>
                <?php endforeach; ?>

            </tr>
        </tbody>
    </table>
    <br>
    <form class="hiddenForm" action="/app/users/todo/tasks.php" method="post">
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
        <button class="toogleButton" type="submit" class="btn btn-info">Add new task</button>
        <table class="hiddenTable">
            <thead>
                <tr>

                    <th>Task</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>✔️</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td class="task">Task</td>
                    <td class="description">Describe task here</td>
                    <td><input type="date" name="deadline"></td>
                    <td><input type="checkbox" class="check">
                    <td>...</td>
                    <td class="delete">
                        <a href="#">X</a>
                    </td>
                </tr>
            </thead>
        </table>
    </form>


</article>



<?php require __DIR__ . '/views/footer.php'; ?>
