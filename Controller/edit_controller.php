<?php
session_start();

$title = $_REQUEST['title'];
$details = $_REQUEST['details'];
$id =  $_REQUEST['id'];

// errors array
$errors = [];

// validation
if (empty($title)) {
   $errors['title_error'] = "Title is missing!";
}
// if (empty($details)) {
//     $errors['details_error'] = "details is missing!";
// }

if(count($errors)>0){
    $_SESSION['errors'] = $errors;
    $_SESSION['old_data'] = $_REQUEST;

    header("Location: ../edit_todo.php?id=$id");
}

else{
    echo  "success";

//     insert data into database
    include '../database/env.php';

    $query =  "UPDATE todos SET title='$title',details='$details' WHERE id = '$id'";
    
    mysqli_query($conn, $query);
    header("Location: ../all_todos.php");

}