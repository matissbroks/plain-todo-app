<?php
require_once "../includes/db.inc.php";

$itemId = $_GET["id"];

if(!is_numeric($itemId)) {
    header("location: ../index.php?error=not-valid-id");
    exit();
}
else {
    $ifExistSql = "SELECT id FROM todo WHERE id = " . $itemId;
    $ifExistResult = $conn->query($ifExistSql);

    if ($ifExistResult->num_rows > 0) {
        $markDoneSql = "UPDATE todo SET is_done = 1 WHERE id = " . $itemId;
        if ($conn->query($markDoneSql) === true) {
            header("location: ../index.php?success=marked-done");
            exit(); // use exit. It's a good practice
        } else {
            echo "Error: " . $conn->error;
            die();
        }
    }
    else {
        header("location: ../index.php?error=unknown-id");
        exit();
    }
}