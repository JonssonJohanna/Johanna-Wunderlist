<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>

    <h1><?php echo $config['title']; ?></h1>


    <?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
        <p>This is your home page.</p>
        <p>Welcome <?php echo $_SESSION['user']['name']; ?>, you are logged in!</p>

    <?php endif; ?>
    <?php if (isset($_SESSION['user']['profile_image'])) : ?>
        <img class="userImage" src="/uploads/<?php echo $_SESSION['user']['profile_image'] ?>" alt="user profile image">
    <?php endif; ?>

</article>

<!-- Loops through all tasks with deadline today. -->
<?php
if (isset($_SESSION['user'])) :
    $currentUser = $_SESSION['user']['id'];
    $todaysTasks = collectTodaysTasks($database, $currentUser); ?>
    <h3 class="todaysTaskTitle">Tasks that needs to be done today</h3>
    <table class="taskTodayContainer">
        <tr class="columnName">
            <th class="column">Title</th>
            <th class="column">Description</th>
            <th class="column">Date</th>
        </tr>

        <?php foreach ($todaysTasks as $todayTask) : ?>
            <tr>

                <td>
                    <?= $todayTask['title']; ?>
                </td>

                <td>
                    <?= $todayTask['description']; ?>
                </td>

                <td>
                    <?= $todayTask['deadline']; ?>
                </td>

            </tr>
        <?php endforeach; ?>

    </table>
<?php endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>
