<?php
require_once "../includes/db.inc.php";

if(!isset($_POST['addTodo'])) {
    header("location: ../index.php?error=not-allowed");
    exit();
}
else {
    if(empty($_POST["newTodo"])) {
        header("location: ../index.php?error=empty-data");
        exit();
    }
    else {
        $insertSql = "INSERT INTO todo (title) VALUES ('".$_POST["newTodo"]."')";

        if ($conn->query($insertSql) === true) {
            header("location: ../index.php?success=created");
            exit();
        }
        else {
            echo "Error: " . $conn->error;
            die();
        }
    }
}
