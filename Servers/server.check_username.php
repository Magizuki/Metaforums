<?php

    include("db.php");

    $username = $_POST['username'];

    $query = "SELECT * FROM user WHERE username = '$username'";

    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 0)
    {
        echo json_encode([
            'isNotExist' => "true"
        ]);
    }
    else
    {
        echo json_encode([
            'isNotExist' => "false"
        ]);
    }

?>