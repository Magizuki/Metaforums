<?php
    require_once("db.php");

    $id = $_GET['id'];

    $query = "DELETE FROM user WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    header("location:../views/auth/Logout.php");

    mysqli_close($conn);
?>