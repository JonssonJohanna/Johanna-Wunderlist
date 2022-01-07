<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// The task ID allows to delete the specifik task -> connected with form in create.php

if (isset($_POST['id'])) {
    $list = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $insertSQL = $database->prepare('DELETE FROM lists WHERE id = :id');
    $insertSQL->bindParam(':id', $list, PDO::PARAM_INT);
    $insertSQL->execute();
}

redirect('/../../create.php');
