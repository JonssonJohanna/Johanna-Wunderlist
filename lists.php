<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Lists</h1>

    </form>
    <h2>Create Lists</h2>
    <form action="/app/users/todo/lists.php" method="post">
        <div class="mb-3 listForm">
            <label for="title">List name</label>
            <input class="form-control" type="name" name="title" id="title" placeholder="write list name here" required>
            <small class="form-text">Please fill in your task name.</small>
        </div>
        <button type="submit" name="submit" class="btn btn-info">New list title</button>
        <br>
        <table>
            <thead>
                <tr>
                    <th>N</th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Check</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td>1</td>
                    <td class="task">Task name</td>
                    <td class="description">Describe task here</td>
                    <td><input type="date" id="deadline" name="deadline"></td>
                    <td class="delete">
                        <a href="#">X</a>
                    </td>
                </tr>
            </thead>
        </table>

        <?php
        // foreach ($title as $row)
        ?>
        <!-- <option><?php echo $row['title'] ?> -->
        </option>

    </form>
</article>


<?php require __DIR__ . '/views/footer.php'; ?>
