<?php

    include("db.php");

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hash = base64_encode($password);

    $query = "INSERT INTO user(email, username, pass, roles, onlinestatus, emailverifystatus, moderationstatus) VALUES ('$email', '$username', '$hash', 'USER', 'Offline', '0', 'Active')";

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

?>