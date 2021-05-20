<?php

    require_once("db.php");

    $id_Reply = $_GET['ReplyID'];
    $id_Thread = $_GET['ThreadID'];

    $query = "DELETE FROM reply WHERE id = '$id_Reply'";
    $result = mysqli_query($conn, $query);

    header("location: http://localhost/Metaforums/views/threadDetail/ViewThread.php?id=".$id_Thread);
    
?>