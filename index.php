<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do App</title>

    <link rel="stylesheet" href="css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>

<?php
    $todos = [
        "Item 1",
        "Item 2",
        "Item 3",
        "Item 4"
    ];
    $todos = [];

    $todosCount = count($todos);
?>

    <div class="container">
        <h1>Plain To-Do App</h1>

        <div class="content-box">
            <div class="header">
                <div class="grid-container">
                    <div class="grid-item">
                        Count of Todo's
                    </div>

                    <div class="grid-item">
                        <?= $todosCount ?>
                    </div>
                </div>
            </div>


            <form action="add.php" method="POST">
                <div class="grid-container input-form">
                    <div class="grid-item">
                        <input type="text" name="newTodo" placeholder="Do a Flip">
                    </div>

                    <div class="grid-item">
                        <button class="add-btn" name="addTodo">Add</button>
                    </div>
                </div>
            </form>


            <div>
                <ul class="todos-list">
                    <?php if(!empty($todos)) { ?>
                        <?php foreach ($todos AS $todo) { ?>
                            <li class="list-item">
                                <?= $todo ?>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>