<?php
    include("../servers/db.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    
    </style>
</head>
<body>
    <?php 
        require_once("../layouts/header.php");
    ?>
    <br>
    <br>
    <div class="container-fluid" style="display: inline;">
        <h5 style="display: inline;">Forum Groups</h3>
        <hr style="float: right; width: 88%;">
    </div>
    <br>
    <br>




</body>
</html>