<?php
    $servername = "localhost";
    $username = "phpuser";
    $password = "phpuser";
    $dbname = "plain_todo_app";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }