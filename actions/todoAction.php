<?php
require_once "../includes/db.inc.php";

if(!isset($_POST)) {
    header("location: ../index.php?error=not-allowed");
    exit();
}
else {
    if($_POST["done"] == 1 || $_POST["delete"] == 1) {
        $itemId = $_POST["todo-item"];
        $ifExistSql = "SELECT id FROM todo WHERE id = " . $itemId;
        $ifExistResult = $conn->query($ifExistSql);

        if ($ifExistResult->num_rows > 0) {
            if ($_POST["done"] == 1) {
                $sqlQuery = "UPDATE todo SET is_done = 1 WHERE id = " . $itemId;
            }
            else if ($_POST["delete"] == 1) {
                $sqlQuery = "DELETE FROM todo WHERE id = " . $itemId;
            }

            if ($conn->query($sqlQuery) === true) {
                header("location: ../index.php?success=marked-done");
                exit();
            } else {
                echo "Error: " . $conn->error;
                die();
            }
        }
    }
    else {
        eader("location: ../index.php?error=not-allowed");
        exit();
    }
}