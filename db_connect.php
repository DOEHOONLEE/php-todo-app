<?php
    $con = mysqli_connect("database","root","tiger","todo_app");

    // Check connection
    if (mysqli_connect_errno()) {
    echo "투두앱 연결에 실패하였습니다. " . mysqli_connect_error();
    exit();
    }
?>