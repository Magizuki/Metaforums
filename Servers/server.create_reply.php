<?php

    require_once('db.php');

    $UserID = $_POST['id_user'];
    $ThreadID = $_POST['id_thread'];
    $Message = $_POST['message'];

    $query = "INSERT INTO reply(user_id, thread_id, message, created_at, updated_at) VALUES ('$UserID', '$ThreadID', '$Message', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
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