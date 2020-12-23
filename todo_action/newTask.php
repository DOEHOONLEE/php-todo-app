<?php

if(isset($_POST['todo-task'])) {
    require '../db_connect.php';

    $title = $_POST['todo-task'];
    
    if(empty($title)) {
        header("Location: ../index.php?mess=error");
    }
    else {

        $todoQuery = "INSERT INTO todos(title) VALUES('$title')";

        if (mysqli_query($con, $todoQuery)) {
            header("Location: ../index.php");
        } else {
            header("Location: ../index.php?mess=error");
        }
        
        mysqli_close($con);
    }
}
else {
    header("Location: ../index.php?mess=error");
}