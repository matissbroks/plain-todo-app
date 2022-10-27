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

    <!-- Fonts related -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Bootstrap 4.4 related -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Custom CSS file-->
    <link rel="stylesheet" href="css/main.css">
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

    <div class="container mt-5">
        <h1 class="text-center mb-2">
            <a class="no-decoration" href="index.php">Plain To-Do App | Bootstrap version</a>
        </h1>

        <div class="container info-container mb-2 p-2">
            <div class="row text-center">
                <div class="col font-weight-bold">Number of items</div>
                <div class="col font-weight-bold"><?= $todosCount; ?></div>
            </div>
        </div>

        <div class="container mb-2 second-container">
            <?php if( isset($_GET['error']) || isset($_GET['success']) ) { ?>
                <?php
                    if( isset($_GET['error']) ) {
                        $classToAdd = "alert-danger";
                        $textToShow = $texts["error"][$_GET['error']];
                    }
                    else {
                        $classToAdd = "alert-success";
                        $textToShow = $texts["success"][$_GET['success']];
                    }
                ?>

                <div class="row mt-3">
                    <div class="col">
                        <div class="alert <?= $classToAdd; ?>" role="alert">
                            <?= $textToShow; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <form class="mt-3" action="actions/add.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="offset-2 col-6">
                            <input type="text" class="form-control" name="todo-item" placeholder="Clean house">
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" name="addTodo">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container todos-container mb-2 pb-3">
            <?php if(!empty($todos)) { ?>
                <?php foreach ($todos AS $todo) { ?>
                    <?php
                        $hide = (bool) $todo["is_done"];
                        $btnClassToAdd = (!$hide) ? "" : "done";
                    ?>

                    <div class="alert alert-primary individual-element mb-2 mt-2">
                        <form action="actions/todoAction.php" method="post">
                            <div class="row">
                                <div class="offset-1 col-8 <?= $btnClassToAdd; ?>">
                                    <?= ucfirst($todo["title"]); ?>
                                </div>

                                <div class="col">
                                    <?php if(!$hide) { ?>
                                        <button type="submit" class="btn btn-success" name="done" value="1">Done</button>
                                    <?php } ?>

                                    <button type="submit" class="btn btn-danger" name="delete" value="1">Delete</button>
                                    <input type="hidden" name="todo-item" value="<?= $todo["id"]; ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="alert alert-warning individual-element mb-2 mt-2">
                    <div class="row">
                        <div class="col text-center">
                            There is no added Todos!
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>