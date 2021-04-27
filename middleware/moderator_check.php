<?php

    if($_SESSION["role"] != "MODERATOR")
    {
        header("Location: http://localhost/Metaforums/views/Home.php");
        exit();
    }

?>