<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php';  ?>

<?php
if (!isset($_SESSION['messages'])) {
    $messages = "";
} else {
    $messages = $_SESSION['messages'];
    unset($_SESSION['messages']);
}
?>

<article>
    <h1>Create an account</h1>
    <p><?= $messages; ?></p>

    <form action="app/users/register.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" id="name" placeholder="Arthur Meland">
            <small class="form-text">Write your name here.</small>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="arthur.meland@lo.com">
            <small class="form-text">Please provide the your email address.</small>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text">Please provide your password (passphrase).</small>
        </div>
        <div class="mb-3">
            <label for="password">RepeatPassword</label>
            <input class="form-control" type="password" name="repeatPassword" id="password" required>
            <small class="form-text">Repeat password.</small>
        </div>


        <button type="submit" class="btn btn-info">Sign up</button>

    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
