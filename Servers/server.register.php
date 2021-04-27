<?php

    include("db.php");
    require_once("../models/user.php");

    $user = new user();
    $user->set_username($_POST["username"]);
    $user->set_email($_POST["email"]); 
    $user->set_pass(base64_encode($_POST["password"]));
    $user->set_roles("USER");
    $user->set_onlinestatus("Offline");
    $user->set_emailverifystatus("0");
    $user->set_moderationstatus("Active");
    $user->set_avatar("http://localhost/Metaforums/assets/avatars/DefaultAvatar.jpg");

    function sendEmail($email)
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
        // $mail->setFrom('no-reply@JustStore.com');
        $mail->Subject = 'Email Verification';
        $mail->Body = "
        <html>
        <head>
            <title>Email Verification</title>
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
                    Hi! You've signed up a <b>Metaforums</b> account.
                    <br>
                    Before we make this official, just want to make sure you know what
                    <br>
                    you're getting into.
                    <br>
                    Please take a moment to verify that this is your email.
                    <br>
                    <br>
                        <a href='http://localhost/Metaforums/Servers/server.update_emailVerified.php?email=".$email."'>Verify My Email Address</a>  
                    <br>
                    <br>
                    If you did not create an account using this email, please ignore this
                    <br>
                    email.
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

    $query = "INSERT INTO user(email, username, pass, roles, onlinestatus, emailverifystatus, moderationstatus, avatar) VALUES ('".$user->get_email()."', '".$user->get_username()."', '".$user->get_pass()."', '".$user->get_roles()."', '".$user->get_onlinestatus()."', '".$user->get_emailverifystatus()."', '".$user->get_moderationstatus()."', '".$user->get_avatar()."')";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        sendEmail($user->get_email());
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