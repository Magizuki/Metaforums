<?php
    include("../../Servers/db.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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

        .card-body a{
            color: blue;
        }

        .card-body a:hover{
            color: orangered;
        }

    </style>
</head>
<body>
<?php
    require_once("../../middleware/usermoderator_check.php");
    require_once("../../layouts/header.php");
    require_once("../../models/user.php");
    $id = $_SESSION["UserID"];
    $query_getUser = "SELECT * FROM user WHERE id = '$id'";
    $result_getUser = mysqli_query($conn, $query_getUser);
    $row = mysqli_fetch_assoc($result_getUser);
    $user = new user();
    $user->set_id($row['id']);
    $user->set_username($row['username']);
    $user->set_email($row['email']);
    $user->set_roles($row['roles']);
    $user->set_onlinestatus($row['onlinestatus']);
    $user->set_avatar($row['avatar']);
    $user->set_moderationstatus($row['moderationstatus']);
    $user->set_logindate($row['logindate']);
    $user->set_emailverifystatus($row['emailverifystatus']);
    $user->set_aboutme($row['aboutme']);
    $user->set_pass(base64_decode($row['pass']));
?>
    <br>
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a id="Profile_TabLink" class="nav-link" href="javascript:generate_Data(event,'Profile');">PROFILE</a>
            </li>
            <li class="nav-item">
                <a id="AccountManagement_TabLink" class="nav-link" href="javascript:generate_Data(event,'Account_Management');">ACCOUNT MANAGEMENT</a>
            </li> 
        </ul>
    </div>
    <br>
    <div id="Profile" class="container-fluid">
        <br>
        <div class="container-fluid" style="background-color: yellow; height: 50px; width: 100%;">
            <span>This is how your profile page will appear to others in public</span>
        </div>
        <br>
        <div class="container-fluid" style="background-color: plum; height: 50px;">
            <span style="color: white;"><?php echo $user->get_username();?>'s Profile</span>
        </div>
        <div class="card-group" style="height: 100%; width: inherit;">
            <div class="row" style="width: inherit; margin: 0px;">
                <div class="card col-lg-3" style="padding:0px;height: 100%;">
                    <div class="card-body" style="height: 300px; margin: auto; text-align: center;">
                        <br>
                        <img class="card-title" src="<?php echo $user->get_avatar(); ?>" alt="Profile Image" style="border-radius: 10px; width: 100px; height: 100px; text-align:center">
                        <br>
                        <span class="card-text"> <?php echo $user->get_username();?></span>
                        <br>
                        <span class="card-text"><?php echo $user->get_onlinestatus();?></span>
                    </div>
                    <div class="card" style="height: 300px;" >
                        <div class="card-body">
                            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg><?php echo " ".$user->get_roles(); ?></span>
                            <!-- <br> -->
                            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg><?php echo " ".$user->get_moderationstatus(); ?></span>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-8" style="padding:0px; width: 75%; height: 100%">
                    <div class="card-body">
                        <h4 class="card-title">About Me</h4>
                        <p class="card-text"><?php echo $user->get_aboutme(); ?></p>
                    </div>
                    <div class="card-group" style="height: 80%;">
                        <div class="card">
                            <div class="card-body"  >
                                <h4 class="card-title" style="text-align: center;">Additional Information</h4>
                                <br>
                                <span class="card-text"><?php echo "Username    : ".$user->get_username(); ?></span>
                                <br>
                                <span class="card-text"><?php echo "E-Mail      : ".$user->get_email(); ?></span>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center;">Recent Post On</h4>
                                <br>
                                <?php
                                    $id = $user->get_id();
                                    $query_get5RecentThread = "SELECT * FROM thread WHERE creator_id = '$id' ORDER BY id DESC LIMIT 10";
                                    $result_get5RecentThread = mysqli_query($conn, $query_get5RecentThread);
                                    echo mysqli_error($conn);
                                    $count = 1;
                                    while($row_thread = mysqli_fetch_assoc($result_get5RecentThread))
                                    {
                                        if($count == 1)
                                        {
                                            if(strlen($row_thread['title']) > 100)
                                            {
                                                echo "<a href='http://localhost/views/threadDetail/ViewThread.php?id=".$row_thread['id']."'>".substr($row_thread['title'], 0, 100)."...</a> <span> by ".$user->get_username()."</span>";
                                            }
                                            else
                                            {
                                                echo "<a href='http://localhost/views/threadDetail/ViewThread.php?id=".$row_thread['id']."'>".$row_thread['title']."</a> <span> by ".$user->get_username()."</span>";
                                            }
                                        }
                                        else
                                        {
                                            echo "<hr>";
                                            if(strlen($row_thread['title']) > 100)
                                            {
                                                echo "<a href='http://localhost/views/threadDetail/ViewThread.php?id=".$row_thread['id']."'>".substr($row_thread['title'], 0, 100)."...</a> <span> by ".$user->get_username()."</span>";
                                            }
                                            else
                                            {
                                                echo "<a href='http://localhost/views/threadDetail/ViewThread.php?id=".$row_thread['id']."'>".$row_thread['title']."</a> <span> by ".$user->get_username()."</span>";
                                            }
                                        }
                                        $count = $count + 1;
                                    }
                                ?>
                        
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    <div id="Account_Management" class="container-fluid">
        <br>
        <form id="headerform" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="displayname" class="col-sm-2 col-form-label">Display Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="displayname" placeholder="Display Name" value="<?php echo $user->get_username(); ?>">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="about" class="col-sm-2 col-form-label">About</label>
                <div class="col-sm-10">
                    <textarea name="about" id="about" class="form-control" cols="50" rows="5" placeholder="About"><?php echo $user->get_aboutme(); ?></textarea>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <div class="form-control" style="height: 100%; width: 50%; display: inline-block;">
                        <input type="file" class="custom-file-input" id="customFile">
                    </div>
                    <img src="<?php echo $user->get_avatar(); ?>" alt="Profile Image" style="border-radius: 10px; width: 150px; height: 150px; margin-right: 150px; float:right">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" id="save" class="btn btn-primary btn-lg">SAVE</button>
                    <div id="headerspinner" class="spinner-border text-primary" role="status">
                    </div>
                </div>
            </div>                         
        </form>
        <br>
        <div class="container-fluid" style="background-color: aquamarine; height: 50px; width: 100%; padding-top: 10px;">
            <span>Changing the fields below require you to access the link sent into your associated e-mail's inbox</span>
        </div>
        <br>
        <form id="detailform" method="post">
            <div class="form-group row">
                <label for="changepassword" class="col-sm-2 col-form-label">Change Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" style="width: 30%; display: inline-block;" id="newpass" placeholder="New Password">
                    <input type="password" class="form-control" style="width: 35%; display: inline-block; margin-left: 10px;" id="confpass" placeholder="Confirm Password">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email Address</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" <?php if($user->get_emailverifystatus() != 1) echo "readonly"; ?> value="<?php echo $user->get_email(); ?>" placeholder="Email">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="deleteaccount" class="col-sm-2 col-form-label">Delete Account</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deleteaccount" placeholder="Re:Input your username here and submit">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="currentpass" class="col-sm-2 col-form-label">Current Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="currentpass" placeholder="Input your password to submit changes">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" id="submitchanges" class="btn btn-primary btn-lg">SUBMIT CHANGES</button>
                    <div id="detailspinner"  class="spinner-border text-primary" role="status">
                    </div>
                </div>
            </div>
        </form>
        <br>     
    </div>
    <br>
<script src="../../javascript/generate_AccountData.js"></script>
<script>
    var email, username, newpass, id, image

    $('#headerform').submit(checkUsername)
    $('#detailform').submit(checkEmail)

    $('#headerspinner').hide()  // Hide it initially
    .ajaxStart(function() {
        $(this).show();
    })
    .ajaxStop(function() {
        $(this).hide();
    })

    $('#detailspinner').hide()  // Hide it initially
    .ajaxStart(function() {
        $(this).show();
    })
    .ajaxStop(function() {
        $(this).hide();
    })

    function checkUsername(e)
    {
        e.preventDefault()
        $.ajax({
        type: 'POST',
        url: 'http://localhost/Metaforums/Servers/server.check_displayname.php',
        data: {
            id : <?php echo $user->get_id(); ?>,
            username : $('#displayname').val() 
        },
        // onLoading: function(){
        //     var spinner = document.getElementById('headerspinner')
        //     spinner.style.display = "inline-block"
        // },
        success: function(data)
        {
            console.log(data);
            data = JSON.parse(data);

            var usernameIsNotExist = data['isNotExist']

            if(usernameIsNotExist == 'false')
            {
                alert("Username is already exist")
                return
            }

            handle_HeaderForm(e)
        }
    
    })

    }

    function checkEmail(e)
    {
        e.preventDefault()
        $.ajax({
        type: 'POST',
        url: 'http://localhost/Metaforums/Servers/server.check_email.php?username=<?php echo $user->get_username(); ?>',
        data: {
            email : $('#email').val() 
        },
        // onLoading: function(){
        //     var spinner = document.getElementById('detailspinner')
        //     spinner.style.display = "inline-block"
        // },
        success: function(data)
        {
            console.log(data);
            data = JSON.parse(data);

            var EmailIsNotExist = data['isNotExist']

            if(EmailIsNotExist == 'false')
            {
                alert("Email is already exist")
                return
            }

            handle_DetailForm(e)
        }
    
    })

    }
    
    function handle_HeaderForm(e)
    {
        var fd = new FormData()
        var files = $('#customFile')[0].files
        var imageIsExist = 1
        e.preventDefault()

        if((($('#displayname').val()).length < 6 || ($('#displayname').val()).length > 20) || $('displayname').val() == "")
        {
            alert("Display name length must between 6 to 20 and Display name cannot be empty")
            $('#displayname').val() = "<?php echo $user->get_username(); ?>"
            return
        }
        if(files.length == 0)
        {
            imageIsExist = 0
        }
    
        if(imageIsExist == 1)
        {
            console.log("testes")
            fd.append('file',files)
        }

        $.ajax({
            type:'POST',
            url:'http://localhost/Metaforums/Servers/server.update_headerinformation.php',
            contentType: false,
            processData: false,
            data:{
                id : <?php echo $user->get_id(); ?>,
                username : $('#displayname').val(),
                about : $('#about').val(),
                fd
            },
            onLoading:function(){
                var spinner = document.getElementById('headerspinner')
                spinner.style.display = "inline-block"
            },
            success: function(data){
                var spinner = document.getElementById('headerspinner')
                spinner.style.display = "none"
                console.log(data)
                data = JSON.parse(data);
                if(data['status'] == 'success')
                {
                    window.location = 'http://localhost/Metaforums/views/account/MyProfile.php'
                }
                else if(data['status'] == 'failed')
                {
                    alert(data['error_message'])
                }
            }
        });

    }

    function handle_DetailForm(e)
    {
        var newpass_isExist = 1
        e.preventDefault()

        if($('#newpass').val().length < 8 || $('#newpass').val() != $('#confpass').val())
        {
            alert("Length password harus lebih dari 8 dan new password harus sama dengan confirm password")
            return
        }
        if($('#newpass').val() == "")
        {
            newpass_isExist = 0
        }
        if($('#currentpass').val() != '<?php echo $user->get_pass(); ?>')
        {
            alert("Please enter the correct password")
            return
        }
        if(newpass_isExist == 1)
        {
            newpass = $('#newpass').val()
        }
        if($('#deleteaccount').val() == '<?php echo $user->get_username(); ?>')
        {
            window.location = "http://localhost/Metaforums/Servers/server.deleteaccount.php?id=<?php echo $user->get_id(); ?>"
            return
        }

        $.ajax({
            type:'POST',
            url:'http://localhost/Metaforums/Servers/server.update_detailinformation.php',
            data:{
                id : <?php echo $user->get_id(); ?>,
                email : $('#email').val(),
                newpass
            },
            onLoading:function(){
                var spinner = document.getElementById('detailspinner')
                spinner.style.display = "inline-block"
            },
            success: function(data){
                var spinner = document.getElementById('detailspinner')
                spinner.style.display = "none"
                data = JSON.parse(data);
                if(data['status'] == 'success')
                {
                    window.location = 'http://localhost/Metaforums/views/account/MyProfile.php'
                }
                else if(data['status'] == 'failed')
                {
                    alert(data['error_message'])
                }
            }
        });

    }

</script>
<script>
    document.getElementById("Profile_TabLink").click()
</script>
<?php
    mysqli_close($conn);
?>    
</body>
</html>
