<?php
    require_once "includes/db.inc.php";
    require_once "includes/infoTexts.php";
?>

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
    $todos = [];
    $todosSelectSQL = "SELECT * FROM todo";
    $todosSelectSQL = $conn->query($todosSelectSQL);

    while($todoRow = $todosSelectSQL->fetch_assoc()) {
        $todos[] = $todoRow;
    }

    $conn->close();

    $todosCount = count($todos);
?>

    <div class="container">
        <h1><a href="index.php">Plain To-Do App</a></h1>

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


            <form action="actions/add.php" method="POST">
                <div class="grid-container input-form">
                    <div class="grid-item">
                        <input type="text" name="newTodo" placeholder="Do a Flip">
                    </div>

                    <div class="grid-item">
                        <button class="btn add-btn" name="addTodo">Add</button>
                    </div>
                </div>
            </form>

            <?php if(isset($_GET['error']) || isset($_GET['success'])) { ?>
                <?php
                    if(isset($_GET['error'])) {
                        $classToAdd = "info-clr-warning";
                        $textToShow = $texts["error"][$_GET['error']];
                    }
                    else {
                        $classToAdd = "info-clr-success";
                        $textToShow = $texts["success"][$_GET['success']];
                    }
                ?>
                <div class="grid-container info-box <?= $classToAdd ?>">
                    <div class="grid-item info-text">
                        <p><?= $textToShow ?></p>
                    </div>
                </div>
            <?php } ?>

            <div>
                <ul class="todos-list">
                    <?php if(!empty($todos)) { ?>
                        <?php foreach ($todos AS $todo) { ?>
                            <li class="list-item <?= ($todo["is_done"]) ? "done" : "" ?>" >
                                <span class="todo">
                                    <?= $todo["title"] ?>
                                </span>

                                <?php if(!$todo["is_done"]) { ?>
                                    <a href="actions/markDone.php?id=<?= $todo["id"] ?>">
                                        <button class="btn btn-done">Done</button>
                                    </a>
                                <?php } ?>

                                <a href="actions/delete.php?id=<?= $todo["id"] ?>">
                                    <button class="btn btn-delete">Delete</button>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>