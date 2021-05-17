<?php

    include("db.php");
    require_once("../models/user.php");

    $user = new user();
    $user->set_username($_POST["username"]);
    $user->set_id($_POST["id"]);
    $id = $user->get_id();
    $query = "SELECT * FROM user WHERE username = '".$user->get_username()."' AND id != '$id'";

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

    mysqli_close($conn);

?>