<?php
    include("../../Servers/db.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Thread</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="http://localhost/Metaforums/javascript/create_Thread.js"></script>
    <style>
        
         a{
            text-decoration: none;
            color: gray;
        }

        body{
            margin: 10px;
        }

        #message{
            padding-bottom: 200px;
        }

    </style>
</head>
<body>
    <?php
        require_once("../../middleware/usermoderator_check.php");
        require_once("../../layouts/header.php");
        require_once("../../models/user.php");
        $SubTopic = $_GET['name'];
        $query = "SELECT * FROM threadsubtopic WHERE threadsubtopic_name = '$SubTopic'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $idUser = $_SESSION['UserID'];
        $query_GetUser = "SELECT * FROM user WHERE id = '$idUser'";
        $result_GetUser = mysqli_query($conn, $query_GetUser);
        $row_GetUser = mysqli_fetch_assoc($result_GetUser);
    ?>
    <br>
    <br>
    <div class="container-fluid">
        <div class="container-fluid" style="background-color: pink; color:black; height: 50px; width: 100%; padding-top:10px">
            <span>Creating Thread in <?php echo $row['threadsubtopic_name'] ?></span>
        </div>
        <div class="card-group">
            <div class="row" style="width: 100%; margin: 0px;">
                <div class="card col-lg-3" style="padding:0px; width:20%">
                    <div class="card-body" style=" margin: auto; text-align: center;">
                        <br>
                        <img class="card-title" src="<?php echo $row_GetUser['avatar']; ?>" alt="Profile Image" style="border-radius: 10px; width: 100px; height: 100px; text-align:center">
                        <br>
                        <a href="http://localhost/Metaforums/views/account/UserProfile.php?id=<?php echo $row_GetUser['id'] ?>"><span class="card-text"> <?php echo $row_GetUser['username'];?></span></a>
                        <br>
                        <span class="card-text"><?php echo $row_GetUser['onlinestatus'];?></span>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg><?php echo " ".$row_GetUser['roles']; ?></span>
                            <!-- <br> -->
                            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg><?php echo " ".$row_GetUser['moderationstatus'];?></span>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-9" style="width: 80%; padding: 0px;">
                    <div class="card-body" style="padding: 0px;">
                        <input type="text" class="form-control" style="width: 100%; height: 20%;" name="title" id="title" placeholder="Thread Title">
                        <textarea class="form-control" name="message" id="message" style="resize: none; width: 100%; height: 80%; padding-left:10px; padding-top:10px;" cols="30" rows="10" placeholder="Message"></textarea>                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <button type="button" onclick="window.location.href = '../Home.php'" class="btn btn-outline-danger" style="float: left;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg></button>
                <button type="button" onclick="createThread('<?php echo $row['id'] ?>','<?php echo $row_GetUser['id'] ?>');" class="btn btn-outline-success" style="float: right;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                </svg></button>
            </div>
        </div>
    </div>
</body>
</html>