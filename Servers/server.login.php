<?php

    include("db.php");
    require_once("../models/user.php");

    $user = new user();
    $user->set_email($_POST["UsernameEmail"]);
    $user->set_username($_POST["UsernameEmail"]);
    $user->set_pass($_POST["password"]);
    $pass = base64_encode($user->get_pass());

    $query = "SELECT * FROM user WHERE (email = '".$user->get_email()."' OR username = '".$user->get_username()."') AND pass = '$pass';";

    $result = mysqli_query($conn, $query);
    echo json_encode($result);

    if(mysqli_num_rows($result) == 1)
    {
        session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION["UserID"] = $row["id"];
        $_SESSION["name"] = $row["username"];
        $_SESSION["role"] = $row["roles"];
        $_SESSION["email"] = $row["email"];

        $id = $_SESSION["UserID"];
        $date = getdate();

        $query2 = "UPDATE user SET onlinestatus = 'Online', logindate= '$date' WHERE id = '$id';";

        $result2 = mysqli_query($conn, $query2);

        if($result2)
        {
            header("location: http://localhost/Metaforums/views/Home.php");
        }
        else
        {
            echo mysqli_error($conn);        
        }

    }
    else
    {
        echo "<script>alert('Username/Email atau Password Salah')</script>";
    }
    
?>