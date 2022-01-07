<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<?php
if (isset($_POST['id'])) {
    $listID = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $insertSQL = $database->prepare('SELECT * FROM lists WHERE id = :id');
    $insertSQL->bindParam(':id', $listID, PDO::PARAM_INT);
    $insertSQL->execute();
    $editLists = $insertSQL->fetch(PDO::FETCH_ASSOC);
}

?>

<form action="/app/lists/update.php" method="post">

    <div class="mb-3 listForm">
        <label for="title">List name</label>
        <input class="form-control" type="name" name="title" id="title" value="<?= $editLists['title'] ?>" required>
        <input type="hidden" name="id" value="<?= $editLists['id'] ?>" />
    </div>
    <button type="submit" name="submit">Submit to edit list name</button>
</form>

</div>
