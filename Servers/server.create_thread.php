<?php

    require_once("db.php");
    $title = $_POST['title'];
    $message = $_POST['message'];
    $UserID = $_POST['IdUser'];
    $SubTopicID = $_POST['IdSubTopic'];

    $query = "INSERT INTO thread(title, message, creator_id, created_at, updated_at, threadsubtopic_id) VALUES('$title','$message','$UserID', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP,'$SubTopicID')";
    $result = mysqli_query($conn, $query);
    
    if($result)
    {
        echo json_encode([
            'status' => 'success'
        ]);
    }
    else
    {
        echo json_encode([
            'status' => 'failed',
            'error_message' => mysqli_error($conn)
        ]);
    }

    mysqli_close($conn);

?>