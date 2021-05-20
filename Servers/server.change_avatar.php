<?php

    require_once("db.php");
    session_start();

    $filename = 'http://localhost/Metaforums/assets/avatars/'. basename($_FILES['file1']['name']);
    $temporaryPath = $_FILES['file1']['tmp_name'];
    move_uploaded_file($temporaryPath,'http://localhost/Metaforums/assets/avatars/'.basename($_FILES['file1']['name']));
    $var3 = "avatar = '".$filename."' ";
    $id = $_SESSION['UserID'];
    $query = "UPDATE user SET $var3 WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        echo json_encode([
            'status' => 'success',
            'avatar' => $filename
        ]);
    }
    else
    {
        echo json_encode([
            'status' => 'failed',
            'error_message' => mysqli_error($conn),
            'query' => $query
        ]);
    }

?>