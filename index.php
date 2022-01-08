<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>


    <?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
        <p>Welcome, <?php echo $_SESSION['user']['name']; ?>, you are logged in!</p>

    <?php endif; ?>
    <?php if (isset($_SESSION['user']['profile_image'])) : ?>
        <img class="userImage" src="/uploads/<?php echo $_SESSION['user']['profile_image'] ?>">
    <?php endif; ?>

    <article>

        <?php
        $tasksDUE = fetchTasksToday($database); ?>

        <?php foreach ($tasksDUE as $dueDate) : ?>
            <div><?= $dueDate['title'] ?></div>
            <?php die(var_dump($dueDate['title'])); ?>
            <div><?= $dueDate['description'] ?></div>
            <div><?= $dueDate['deadline'] ?></div>
        <?php endforeach; ?>

    </article>

    <?php require __DIR__ . '/views/footer.php'; ?>
