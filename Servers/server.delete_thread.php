<?php

    require_once("db.php");

    $id = $_GET['id'];
    $query = "DELETE FROM thread where id ='$id'";
    $result = mysqli_query($conn, $query);

    $query2 = "DELETE FROM reply WHERE thread_id = '$id'";
    $result2 = mysqli_query($conn, $query2);

    if($result && $result2)
    {
        header("location: http://localhost/Metaforums/views/Home.php");
    }
    else
    {
        echo mysqli_error($conn);
    }

    mysqli_close($conn);

?>