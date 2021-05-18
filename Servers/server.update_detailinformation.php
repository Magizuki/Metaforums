<?php

    require_once("db.php");

    $id = $_POST['id'];
    $var1 = "";
    $var2 = "";
    $var3 = "";

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
                    Hi! You've change email a <b>Metaforums</b> account.
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
                    If you did not change email in an account using this email, please ignore this
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

    if(isset($_POST['email']))
    {
        $email = $_POST['email'];
        $var1 = "email = '".$email."' ";
        $var3 = "emailverifystatus = '0'";
        sendEmail($email);
        $query = "UPDATE user SET $var1,$var3 WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        session_start();
        if($_SESSION["email"] != $_POST["email"])
        {
            $_SESSION["isVerified"] = 0;
            $_SESSION["email"] = $_POST["email"];
        }
    }
    if(isset($_POST['newpass']))
    {
        $newpass = base64_encode($_POST['newpass']);
        $var2 = "pass = '".$newpass."' ";
        $query = "UPDATE user SET $var2 WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
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
            'error_message' => mysqli_error($conn)
        ]);
    }


    mysqli_close($conn);

?>