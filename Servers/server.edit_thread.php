<?php

    require_once('db.php');

    $id = $_POST['id'];
    $title = $_POST['newtitle'];
    $message = $_POST['newmessage'];

    $query = "UPDATE thread SET title = '$title', message = '$message', updated_at = CURRENT_DATE WHERE id = '$id'";
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