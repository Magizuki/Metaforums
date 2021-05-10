<?php

    include("../../servers/db.php");
    session_start();

    $id = $_SESSION["UserID"];

    $query = "UPDATE user SET onlinestatus = 'Offline' WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        session_destroy();
        header("Location: http://localhost/Metaforums/views/auth/Login.php");
    }
    else
    {
        echo mysqli_error($conn);
    }

    mysqli_close($conn);

?>