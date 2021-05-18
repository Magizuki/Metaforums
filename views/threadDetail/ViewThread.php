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

    <style>

        a{
            text-decoration: none;
            color: gray;
        }

        body{
            margin: 10px;
        }

        .card-body a {
            color: black;
        }

        .card-body a:hover {
            color: blue;
        } 

    </style>

</head>
<body>
    <?php
        require_once("../../middleware/usermoderator_check.php");
        require_once("../../layouts/header.php");
        require_once("../../models/user.php");
        $id = $_GET["id"];
        $query_GetThread = "SELECT * FROM thread WHERE id = '$id' ";
        $query_GetThreadDate ="SELECT DATE_FORMAT(created_at, '%M %d %Y %r') as created_at FROM thread WHERE id = '$id'";
        $result_GetThreadDate = mysqli_query($conn, $query_GetThreadDate);
        $row3 = mysqli_fetch_assoc($result_GetThreadDate);
        $result_GetThread = mysqli_query($conn, $query_GetThread);
        $row = mysqli_fetch_assoc($result_GetThread);
        $id_subtopic = $row["threadsubtopic_id"];
        $query_GetSubTopic = "SELECT * FROM threadsubtopic WHERE id = '$id_subtopic'";
        $result_GetSubTopic = mysqli_query($conn, $query_GetSubTopic);
        $row2 = mysqli_fetch_assoc($result_GetSubTopic);
        $idUser = $row['creator_id'];
        $query_GetUser = "SELECT * FROM user WHERE id = '$idUser'";
        $result_GetUser = mysqli_query($conn,$query_GetUser);
        $row4 = mysqli_fetch_assoc($result_GetUser);
    ?>
    <br>
    <br>
    <div class="container-fluid">
        <h5>Thread in : <?php echo $row2["threadsubtopic_name"]; ?></h4>
        <br>
        <h1><?php echo $row["title"]; ?></h1>
        <p class="text-body">Posted at : <?php echo $row3['created_at']; ?></p>
        <br>
        <div class="container-fluid" style="background-color: greenyellow; height: 50px; width: 100%; padding-top:10px">
            <span>Main Post</span>
        </div>
        <div class="card-group">
            <div class="row" style="width: 100%; margin: 0px;">
                <div class="card col-lg-3" style="padding:0px; width:20%">
                    <div class="card-body" style=" margin: auto; text-align: center;">
                        <br>
                        <img class="card-title" src="<?php echo $row4['avatar']; ?>" alt="Profile Image" style="border-radius: 10px; width: 100px; height: 100px; text-align:center">
                        <br>
                        <a href="http://localhost/Metaforums/views/account/UserProfile.php?id=<?php echo $row4['id'] ?>"><span class="card-text"> <?php echo $row4['username'];?></span></a>
                        <br>
                        <span class="card-text"><?php echo $row4['onlinestatus'];?></span>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg><?php echo " ".$row4['roles']; ?></span>
                            <!-- <br> -->
                            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg><?php echo " ".$row4['moderationstatus']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-9" style="width: 80%;">
                    <div class="card-body">
                        <p class="card-text"><?php echo $row['message']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <button type="button" class="btn btn-outline-info" style="float: right;">Reply</button>
                <button type="button" class="btn btn-outline-danger" style="float: right; margin-right: 10px;">Report</button>
            </div>
        </div>
        <br>
        <br>



    </div>       
<?php
    mysqli_close($conn);
?>  
</body>
</html>