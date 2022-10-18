<?php
require_once "../includes/db.inc.php";

$itemId = $_GET["id"];
if(!is_numeric($itemId)) {
    header("location: ../index.php?error=not-valid-id");
    exit();
}
else {
    $ifExist = $conn->query("SELECT id FROM todo WHERE id = " . $itemId);

    if ($ifExist->num_rows > 0) {
        $sql = "DELETE FROM todo WHERE id = " . $itemId;
        if ($conn->query($sql) === true) {
            header("location: ../index.php?success=deleted");
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

