<?php

if(!isset($_POST['addTodo'])) {
    echo "Not allowed";
}
else {
    if(empty($_POST["newTodo"])) {
        echo "Empty input";
    }
    else {
        print_r($_POST);
    }
}
