<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Login on this page</h1>

    <form action="app/users/login.php" method="post">
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="arthur.meland@lo.com" required>
            <small class="form-text">Please provide the your email address.</small>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text">Please provide the your password.</small>
        </div>
        <button type="submit">Login</button>

    </form>

    <form method="GET" action="register.php">
        <button type="submit">Sign up</button>
    </form>


</article>

<?php require __DIR__ . '/views/footer.php'; ?>
