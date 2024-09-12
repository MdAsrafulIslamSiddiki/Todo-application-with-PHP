<?php
session_start();

$title = $_REQUEST['title'];
$details = $_REQUEST['details'];

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

    header("Location: ../index.php");
}

else{
    // insert data into database
    include '../database/env.php';

    $query =  "INSERT INTO todos(title, details) VALUES('$title','$details')";
    
    mysqli_query($conn, $query);
    header("Location: ../index.php");

}