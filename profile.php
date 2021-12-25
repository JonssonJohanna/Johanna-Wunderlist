<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php';  ?>


<article>
    <h1>Edit your profile</h1>

    <form action="/app/users/update/image.php" method="post" enctype="multipart/form-data">
        <!-- This should be in ist own form -->
        <!-- <form action="app/users/images.php" method="post" enctype="multipart/form-data"> -->
        <div>
            <label for="profile_image">Upload optional image here</label>
            <input type="file" name="profile_image" id="profile_image" accept=".jpg, .png" required>

            <button type="submit" class="btn btn-info">Upload image</button>
        </div>

    </form>

    <form action="/app/users/update/email.php" method="post">
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="newEmail" id="email" placeholder="enter your new email" required>
            <small class="form-text">Please provide your new email address.</small>
            <button type="submit" class="btn btn-info">Update new email</button>
        </div>

    </form>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>
