<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>

    <h1><?php echo $config['title']; ?></h1>
    <p>This is your home page.</p>


    <?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
        <p>Welcome <?php echo $_SESSION['user']['name']; ?>, you are logged in!</p>

    <?php endif; ?>
    <?php if (isset($_SESSION['user']['profile_image'])) : ?>
        <img class="userImage" src="/uploads/<?php echo $_SESSION['user']['profile_image'] ?>">
    <?php endif; ?>

</article>
<?php
if (isset($_SESSION['user'])) :
    $currentUser = $_SESSION['user']['id'];
    $todaysTasks = collectTodaysTasks($database, $currentUser);


?>

    <div class="columnName">
        <div class="column">Completed</div>
        <div class="column">Title</div>
        <div class="column">Description</div>
        <div class="column">Date</div>

    </div>
    <?php foreach ($todaysTasks as $todayTask) : ?>
        <div class="rowName">

            <ul>

                <li>
                    <form class="formCheckbox" action="/app/tasks/completed.php" method="POST">
                        <input type="hidden" name="id" value=" <?= $todayTask['id'] ?>">

                        <input type="checkbox" name="completed" id="completed" <?= $todayTask['completed'] ? 'checked' : '' ?>>

                        <label for="checkBoxes">

                        </label>

                        <!-- <div>
                            <button type="submit">Submit</button>
                        </div> -->
                    </form>

                </li>

            </ul>
            <ul>
                <li><?= $todayTask['title']; ?></li>
            </ul>

            <ul>
                <li><?= $todayTask['description']; ?></li>
            </ul>

            <ul>
                <li><?= $todayTask['deadline']; ?></li>
            </ul>

        </div>
    <?php endforeach; ?>

<?php endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>
