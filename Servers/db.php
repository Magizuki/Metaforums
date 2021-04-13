<?php

    $serverName = 'Localhost';
    $username = 'root';
    $password = '';
    $dbName = 'metaforums';

    $conn = mysqli_connect($serverName,$username,$password,$dbName);

    if(!$conn){
        die('Fail to connect database');
    }

?>