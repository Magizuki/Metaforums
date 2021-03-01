<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <style>

        a{  
            text-decoration: none;
            color: gray;
        }

        .container{
            text-align: center;
            margin: auto;
        }

        h1{
            color: gray;
        }

        form{
            margin-left: 40%;
            margin-right: 40%;
        }

        button{
            width: 100%;
        }

        .btn{
            border-radius: 20px;
        }

    </style>
</head>
<body>
    
    <div class="container-fluid">
        <a href="Register.php">SIGN UP</a>
        <br>
        <br>
        <div class="container">
            <h1>Metaforums</h1>
            <br>
            <form method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="UsernameEmail" name="UsernameEmail"  placeholder="Username or E-mail">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">LOG IN</button>
                </div>
            </form>
            <br>
            <a href="ForgotPassword.php">Forgot your password ?</a>
        </div>
    </div>
    
</body>
</html>