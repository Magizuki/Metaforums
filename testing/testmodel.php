<?php

    require_once('../models/user.php');

    $user = new user();
    $user->set_username("Magizuki");
    echo $user->username;

?>