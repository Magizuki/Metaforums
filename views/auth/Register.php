<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <style>

        a{
            text-decoration: none;
            color: gray;
        }

        h1:hover
        {
            color: blue;
        }

        .container{
            text-align: center;
            margin: auto;
        }

        h1{
            color: gray;
        }

        form{
            margin-left: 35%;
            margin-right: 35%;
        }

        .btn{
            width: 100%;
        }

        .btn, .form-control{
            border-radius: 20px;
        }

        #errorMessage
        {
            color: red;
        }
    
    </style>
     
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION["UserID"]))
        {
            header("location:http://localhost/Metaforums/views/Home.php");
        }
    ?>
    <div class="container-fluid">
        <a href="Login.php">LOG IN</a>
        <br>
        <br>
        <div class="container">
            <a href="../Home.php"><h1 style="display: inline-block;">Metaforums</h1></a>
            <br>
            <br>
            <form method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email"  placeholder="E-mail">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username"  placeholder="Username">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
                </div>
                <br>
                <div class="form-group">
                    <input type="button" onclick="handleRegisterForm();" class="btn btn-primary" value="SIGN UP">
                </div>
                <br>
                <div class="form-group">
                    <div id="spinner" style="margin-left:10px;" class="spinner-border text-primary" role="status">
                    </div>
                    <label id="errorMessage"></label>
                </div>
            </form>
        </div>
    </div>
    <script src="../../javascript/register.js"></script>
</body>
</html>