<?php

    include("db.php");

    $email = $_GET["email"];

    $query = "SELECT * FROM user WHERE email = '$email'";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        $query2 = "UPDATE user SET emailverifystatus = '1' WHERE email = '$email'";

        $result2 = mysqli_query($conn, $query2);

        if($result2)
        {
            header("location: http://localhost/Metaforums/views/auth/Login.php");
        }

        echo mysqli_error($conn);

    }
    else
    {
        echo mysqli_error($conn);
    }

    mysqli_close($conn);


?>