<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php';  ?>


<article>
    <h1>Become a member on this page</h1>

    <form action="app/users/register.php" method="post" enctype="multipart/form-data">
        <!-- This should be in it own form -->
        <!-- <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" type="name" name="name" id="name" placeholder="Arthur Meland" required>
            <small class="form-text">Write your name here.</small>
        </div> -->
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
        <!-- This should be in it own form -->
        <!-- <div>
            <label for="avatar">Upload optional image here</label>
            <input type="file" name="avatar" id="avatar" accept=".jpg, .png" required>

        </div> -->


        <button type="submit" class="btn btn-info">Sign up</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
