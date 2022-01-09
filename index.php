<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<?php
$currentUser = $_SESSION['user']['id'];
$todaysTasks = collectTodaysTasks($database, $currentUser);

?>
<?php foreach ($todaysTasks as $todayTask) : ?>

    <div><?= $todayTask['title']; ?></div>
    <div><?= $todayTask['description']; ?></div>
    <div><?= $todayTask['deadline']; ?></div>

<?php endforeach; ?>



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

<?php require __DIR__ . '/views/footer.php'; ?>
