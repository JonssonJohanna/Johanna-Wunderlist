<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Lists</h1>

    </form>
    <h2>Create Lists</h2>
    <form action="/app/users/todo/lists.php" method="post">
        <div class="mb-3">
            <label for="title">List name</label>
            <input class="form-control" type="name" name="title" id="title" placeholder="write list name here" required>
            <small class="form-text">Please fill in your task name.</small>
        </div>
        <button type="submit" class="btn btn-info">New list title</button>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
