<?php

    if($_SESSION["role"] != "MODERATOR" && $_SESSION["role"] != "USER")
    {
        header("Location: http://localhost/Metaforums/views/Home.php");
        exit();
    }

?>