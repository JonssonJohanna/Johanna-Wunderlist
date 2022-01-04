<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>

    </form>
    <h2>Create Lists</h2>
    <form action="/app/users/todo/lists.php" method="post">
        <div class="mb-3 listForm">
            <label for="title">List name</label>
            <input class="form-control" type="name" name="title" id="title" placeholder="write list name here" required>
        </div>
        <button type="submit" name="submit" class="btn btn-info">Create list</button>
        <br>
        <table>
            <thead>
                <tr>
                    <th>List</th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>✔️</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td>List</td>
                    <td class="task">Task</td>
                    <td class="description">Describe task here</td>
                    <td><input type="date" name="deadline"></td>
                    <td class="check">
                        <a href="#">X</a>
                    </td>
                </tr>
            </thead>
        </table>

    </form>
    <?php

    foreach ($title as $list);
    $list['title']; ?>

    <div>
        <p>
        <h2 </p>
    </div>

    </form>
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
    </form>


</article>



<?php require __DIR__ . '/views/footer.php'; ?>
