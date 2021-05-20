<?php

    require_once("db.php");
    $var1 = "";
    $var2 = "";
    $var3 = "";
    
    $id = $_POST['id'];

    if(isset($_POST['username']))
    {
        $username = $_POST['username'];
        $var1 = "username = '".$username."' ";
    }
    if(isset($_POST['about']))
    {
        $about = $_POST['about'];
        $var2 = "aboutme = '".$about."' ";
    }
    // if(isset($_FILES['file']['name']))
    // {
    //     $filename = 'http://localhost/Metaforums/assets/avatars/'. basename($_FILES['file']['name']);
    //     $temporaryPath = $_FILES['file']['tmp_name'];
    //     move_uploaded_file($temporaryPath,'http://localhost/Metaforums/assets/avatars/'.basename($_FILES['file']['name']));
    //     $var3 = "avatar = '".$filename."' ";
    //     echo $var3;
    //     $query = "UPDATE user SET $var1,$var2,$var3 WHERE id = '$id'";
    // }
    //else{
        $query = "UPDATE user SET $var1,$var2 WHERE id = '$id'";
    //}

    session_start();
    if($_POST["username"] != $_SESSION["name"])
    {
        $_SESSION["name"] = $_POST["username"];
    }

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
            'error_message' => mysqli_error($conn),
            'query' => $query,
            'tes' => $_POST['id']
        ]);
    }

    mysqli_close($conn);

?>