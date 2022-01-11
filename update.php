<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php';  ?>



<article>
    <h2>Edit your profile</h2>

    <form action="/app/users/update/image.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="profile_image">Upload optional image here</label>
            <input type="file" name="profile_image" id="profile_image" accept=".jpg, .png" required>

            <button type="submit">Upload image</button>
        </div>

        <!-- alert user that their new image is uploaded and displays the image on both profile.php and image.php -->
        <?php if (isset($_SESSION['messages'])) :
            echo $_SESSION['messages'];
            unset($_SESSION['messages']);

            if (isset($_SESSION['user']['profile_image'])) :
        ?>
                <div class="newImage"><img height="200px" width="280px" src="/uploads/<?php echo $_SESSION['user']['profile_image'] ?>"></div>

        <?php endif;
        endif; ?>
    </form>
    <h3>Edit email</h3>
    <form action="/app/users/update/email.php" method="post">
        <div class="mb-3">
            <label for="newEmail">Email</label>
            <input class="form-control" type="email" name="newEmail" id="newEmail" placeholder="enter your new email" required>
            <small class="form-text">Please provide your new email address.</small>
            <button type="submit">Update email</button>
        </div>
        <?php if (isset($_SESSION['messageEmail'])) :
            echo $_SESSION['messageEmail'];
            unset($_SESSION['messageEmail']);

        endif;
        ?>
    </form>

    <h3>Edit password</h3>
    <form action="/app/users/update/password.php" method="POST">

        <div class="mb-3">
            <label for="newPassword">Write new password</label>
            <input class="form-control" type="password" name="newPassword" id="newPassword">
            <small class="form-text">Write your new password.</small>

        </div>
        <?php
        if (isset($_SESSION['messageError'])) :
            echo $_SESSION['messageError'];
            unset($_SESSION['messageError']);

        endif; ?>
        <div class="mb-3">
            <label for="confirmNewPassword">Confirm new password</label>
            <input class="form-control" type="password" name="confirmNewPassword" id="confirmNewPassword">
            <small class="form-text">Confirm your new password.</small>
        </div>
        <button type="submit">Update password</button>
        <div class="alertText">
            <?php if (isset($_SESSION['messagePassword'])) :
                echo $_SESSION['messagePassword'];
                unset($_SESSION['messagePassword']);

                if (isset($_SESSION['user']['messagePassword'])) :

                endif;
            endif; ?>
        </div>

    </form>

</article>


<?php require __DIR__ . '/views/footer.php'; ?>
