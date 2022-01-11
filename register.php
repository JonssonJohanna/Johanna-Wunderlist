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
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="arthur.meland@lo.com">
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter password" required>
        </div>
        <div class="mb-3">
            <label for="password">Repeat password</label>
            <input class="form-control" type="password" name="repeatPassword" id="password" placeholder="Verify password" required>
        </div>
        <div class="alertText">
            <?php
            if (isset($_SESSION['messageError'])) :
                echo $_SESSION['messageError'];
                unset($_SESSION['messageError']);

            endif; ?>
        </div>

        <button>Sign up</button>

    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
