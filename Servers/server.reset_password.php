<?php

    include("db.php");
    $email = $_POST["email"];
    function sendEmail($email, $name)
    {

        require_once("../PHPMailer/PHPMailerAutoload.php");
        
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls1.3';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '587';
        $mail->isHTML();
        $mail->Username = 'metaforumsdev@gmail.com';
        $mail->Password = 'babayaga123';
        $mail->setFrom('no-reply@JustStore.com');
        $mail->Subject = 'Reset Password';
        $mail->Body = "
        <html>
        <head>
            <title>Reset Password</title>
            <style>

            .content{
                text-align: center;
                background-color: whitesmoke;
                margin: auto;
                width: 50%;
            }
            h1{
                color: blue;
            }
            button{
                    background-color: orange;
                    border: none;
                    color: white;
                    padding: 10px 22px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
            }
            button:hover{
                background-color: blue;
            }
            .sub-content{
                width: 80%;
                border: 2px dotted black;
                margin: auto;    
            }


            </style>
        </head>
        <body>
            <br>
            <div class='content'>
                <br>
                <h1>Metaforums</h1>
                <br>
                <br>
                <div class='sub-content'>
                <br>
                Hi ".$name.",
                <br>
                <br>
                Here is your new password: <b>metaforums123</b>
                <br>
                Please log in again and immediately change your password
                <br>
                <br>
                <b style='color: red; font-size: 20px;'>DO NOT SHARE YOUR PASSWORD</b>
                    <br>
                    <br>
                        <form method='POST' action='http://localhost/Metaforums/views/auth/Login.php'>
                            <button name='ResetPass' type='submit'>Reset Password</button>
                        </form> 
                    <br>
                    <br>
                    Regards,
                    <br>
                    <b>Metaforums Developer</b>
                    <br>
                    <br>
                </div>
                <br>
                2020 <b style='color: blue;'>Metaforums</b>
                <br>
                <br>
            </div>
        </body>         
        </html>";

        // <form method='POST' action='http://localhost/JustStore/servers/server.update_emailVerified.php?email=".$email.">
        //     <button name='VerifyEmail' class='btn btn-warning' type='submit'>Verify My Email Address</button>
        // </form>

        $mail->addAddress($email);
        $mail->send();
    }
    $pass = base64_encode("metaforums123");
    $query = "UPDATE user set pass = '$pass'";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        
        $query2 = "SELECT * FROM user WHERE email = '$email'";
        $result2 = mysqli_query($conn, $query2);

        $row = mysqli_fetch_assoc($result2);

        $name = $row["username"];
        sendEmail($email, $name);
        header("location: http://localhost/Metaforums/views/auth/Login.php");
    }
    else
    {
        echo mysqli_error($conn);
    }

?>