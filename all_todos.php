<?php
session_start();

include './database/env.php';
$query = "SELECT * FROM todos order by id DESC";
$result = mysqli_query($conn, $query);
$all_datas = mysqli_fetch_all($result, 1);

// echo "<pre>";
// print_r($datas);
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
            <div class="card-header">All todo</div>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Details</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_datas as $key => $data) {
                        ?>
                            <tr>
                                <td><?= ++$key?></td>
                                <td><?= $data['title']?></td>
                                <td><?= empty($data['details']) ? '---' : (strlen($data['details']) >11 ? substr($data['details'],0,10) . '... ' : $data['details']) ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="./Controller/detele_controller.php?id=<?=$data['id']?>" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php
session_unset();
?>