<?php

$id = $_REQUEST['id'];

include '../database/env.php';
$query = "DELETE FROM todos WHERE id = '$id'";
$result = mysqli_query($conn, $query);
header("Location: ../all_todos.php");



