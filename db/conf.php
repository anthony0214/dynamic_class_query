<?php
//db creds
define('DB_HOST', 'localhost'); //db host
define('DB_NAME', 'dummy'); //db name
define('DB_USER', 'root'); //db user
define('DB_PASS', ''); //db pass

//$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}