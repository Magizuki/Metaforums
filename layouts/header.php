<?php
        if(isset($_SESSION["UserID"]))
        { 
            if($_SESSION["role"] == "USER")
            {
    ?>
    <div class="container-fluid">
        <!-- <div class="row"> -->
            <span>
                <a href="http://localhost/Metaforums/views/auth/Logout.php">LOGOUT</a>
            </span>
            <span style="margin-left:35%;">
                <a href="http://localhost/Metaforums/views/Home.php"><h1 style="display: inline-block;">Metaforums</h1></a>
            </span>
            <span style="float: right; margin-top: 20px;">
                <a href="http://localhost/Metaforums/views/account/MyProfile.php">ACCOUNT</a>
            </span>
        <!-- </div> -->
    </div>
    <?php
            }
            else if($_SESSION["role"] == "MODERATOR")
            {
    ?>
    <div class="container-fluid">
        <!-- <div class="row"> -->
            <span>
                <a href="http://localhost/Metaforums/views/auth/Logout.php">LOGOUT</a>
            </span>
            <span style="margin-left:35%;">
                <a href="http://localhost/Metaforums/views/Home.php"><h1 style="display: inline-block;">Metaforums</h1></a>
            </span>
            <span style="margin-top: 20px; float: right;">
                <a href="">USER MANAGEMENT</a>
            </span>
            <span style="margin-top: 20px; float: right;">
                <a href="http://localhost/Metaforums/views/account/MyProfile.php">ACCOUNT</a>
            </span>
        <!-- </div> -->
    </div>
    <?php
            }
        }
        else
        {
    ?>
    <div class="container-fluid">
        <!-- <div class="row"> -->
            <span>
                <a href="http://localhost/Metaforums/views/auth/Login.php">LOG IN</a>
            </span>
            <span style="margin-left:15px;">
                <a href="http://localhost/Metaforums/views/auth/Register.php">SIGN UP</a>
            </span>
            <span style="margin-left:40%; margin-right: 40%;">
                <a href="http://localhost/Metaforums/views/Home.php"><h1 style="display: inline-block;">Metaforums</h1></a>
            </span>
        <!-- </div> -->
    </div>
    <?php
        }
        
    ?>