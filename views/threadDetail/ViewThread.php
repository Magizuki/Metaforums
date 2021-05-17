<?php
    include("../../Servers/db.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Thread</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        require_once("../../middleware/usermoderator_check.php");
        require_once("../../layouts/header.php");
        require_once("../../models/user.php");
        $id = $_GET["id"];
        $query_GetThread = "SELECT * FROM thread WHERE id = '$id' ";
        $result_GetThread = mysqli_query($conn, $query_GetThread);
        $row = mysqli_fetch_assoc($result_GetThread);
        $id_subtopic = $row["threadsubtopic_id"];
        $query_GetSubTopic = "SELECT * FROM threadsubtopic WHERE id = '$id_subtopic'";
        $result_GetSubTopic = mysqli_query($conn, $query_GetSubTopic);
        $row2 = mysqli_fetch_assoc($result_GetSubTopic);
    ?>
    <br>
    <div class="container-fluid">
        <h4>Thread in : <?php echo $row["threadsubtopic_name"]; ?></h4>
        <br>
        <h3><?php echo $row["title"]; ?></h3>
    </div>    
<?php
    mysqli_close($conn);
?>  
</body>
</html>