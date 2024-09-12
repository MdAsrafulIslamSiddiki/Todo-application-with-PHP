<?php
include './database/env.php';

$id = $_REQUEST['id'];
$query = "SELECT * FROM todos WHERE id = $id";
$result = mysqli_query($conn, $query);
$data =  mysqli_fetch_assoc($result);

if ($data == null) {
    header("Location: ./404.php");
    exit();
}

// echo "<pre>";
// var_dump($data);
// echo "</pre>";


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
            <div class="card-header">Edit todo</div>
            <div class="card-body">
                <form action="./Controller/edit_controller.php" method="post">
                    <input type="hidden" name="id" value="<?= $data['id'] ?? null ?>">
                    <input value="<?= $data['title'] ?? null ?>" name="title" type="text" class="form-control mb-2" placeholder="Todo title">
                    <p class="text-danger">
                        <?= $_SESSION['errors']['title_error'] ?? null ?>
                    </p>
                    <textarea name="details" id="" placeholder="Todo details" class="form-control"><?= $data['details'] ?? null ?></textarea>
                    <p class="text-danger">
                        <?= $_SESSION['errors']['details_error'] ?? null ?>
                    </p>
                    <button type="submit" class="btn btn-primary mt-2">Update Todo</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
