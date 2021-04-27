<?php

    include("db.php");
    require_once("../models/user.php");

    $user = new user();
    $user->set_username($_POST["username"]);
    $query = "SELECT * FROM user WHERE username = '".$user->get_username()."'";

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