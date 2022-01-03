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

        <!-- alert user that their new image is uploaded and displays the image on both profile.php and image.php -->
        <?php if (isset($_SESSION['messages'])) :
            echo $_SESSION['messages'];
            unset($_SESSION['messages']);

            if (isset($_SESSION['user']['profile_image'])) :
        ?>
                <div class="userImage"><img src="/uploads/<?php echo $_SESSION['user']['profile_image'] ?>"></div>

        <?php endif;
        endif; ?>
    </form>
    <h2>Edit email</h2>
    <form action="/app/users/update/email.php" method="post">
        <div class="mb-3">
            <label for="newEmail">Email</label>
            <input class="form-control" type="email" name="newEmail" id="newEmail" placeholder="enter your new email" required>
            <small class="form-text">Please provide your new email address.</small>
            <button type="submit" class="btn btn-info">Update new email</button>
        </div>
        <?php if (isset($_SESSION['messageEmail'])) :
            echo $_SESSION['messageEmail'];
            unset($_SESSION['messageEmail']);

        endif;
        ?>
    </form>

    <h2>Edit password</h2>
    <form action="/app/users/update/password.php" method="POST">

        <div class="mb-3">
            <label for="newPassword">Write new password</label>
            <input class="form-control" type="password" name="newPassword" id="newPassword">
            <small class="form-text">Write your new password (passphrase).</small>

        </div>
        <div class="mb-3">
            <label for="confirmNewPassword">Confirm new password</label>
            <input class="form-control" type="password" name="confirmNewPassword" id="confirmNewPassword">
            <small class="form-text">Confirm your new password (passphrase).</small>
        </div>
        <button type="submit" class="btn btn-info">Update new password</button>

        <?php if (isset($_SESSION['messagePassword'])) :
            echo $_SESSION['messagePassword'];
            unset($_SESSION['messagePassword']);


        ?>
        <?php
            if (!isset($_SESSION['messageError'])) {
                $errormessage = "";
            } else {
                $errormessage = $_SESSION['messageError'];
                unset($_SESSION['messageError']);
            }
        endif;
        ?>

    </form>

</article>


<?php require __DIR__ . '/views/footer.php'; ?>
