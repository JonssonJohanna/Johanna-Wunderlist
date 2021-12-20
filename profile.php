<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php';  ?>


<article>
    <h1>Edit your profile</h1>

    <form action="/app/users/images.php" method="post" enctype="multipart/form-data">
        <!-- This should be in ist own form -->
        <!-- <form action="app/users/images.php" method="post" enctype="multipart/form-data"> -->
        <div>
            <label for="profile_image">Upload optional image here</label>
            <input type="file" name="profile_image" id="profile_image" accept=".jpg, .png" required>

        </div>


        <button type="submit" class="btn btn-info">Sign up</button>

    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
