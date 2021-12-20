<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php';  ?>


<article>
    <h1>Create an account</h1>

    <form action="app/users/register.php" method="post">
        <!-- This should be in it own form -->
        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" id="name" placeholder="Arthur Meland" required>
            <small class="form-text">Write your name here.</small>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="arthur.meland@lo.com" required>
            <small class="form-text">Please provide the your email address.</small>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text">Please provide the your password (passphrase).</small>
        </div>
        <!-- This should be in ist own form -->
        <form action="app/users/images.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="profile_image">Upload optional image here</label>
                <input type="file" name="profile_image" id="profile_image" accept=".jpg, .png" required>

            </div>


            <button type="submit" class="btn btn-info">Sign up</button>
        </form>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
