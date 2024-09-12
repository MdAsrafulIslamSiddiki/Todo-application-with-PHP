<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include './include/navigation_bar.php';
    ?>

    <div class="col-lg-5 mx-auto">
        <div class="card">
            <div class="card-header">Add todo</div>
            <div class="card-body">
                <form action="./Controller/todo_controller.php" method="post">
                    <input value="<?= $_SESSION['old_data']['title'] ?? null ?>" name="title" type="text" class="form-control mb-2" placeholder="Todo title">
                    <p class="text-danger">
                        <?= $_SESSION['errors']['title_error'] ?? null ?>
                    </p>
                    <textarea name="details" id="" placeholder="Todo details" class="form-control"><?= $_SESSION['old_data']['details'] ?? null ?></textarea>
                    <p class="text-danger">
                        <?= $_SESSION['errors']['details_error'] ?? null ?>
                    </p>
                    <button type="submit" class="btn btn-primary mt-2">Add</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
session_unset();
?>