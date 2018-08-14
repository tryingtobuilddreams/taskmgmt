<?php
//establishes connection to database containing user information
$connection=mysqli_connect("localhost","darius","moonbounce1997","taskmgmt");
if(!$connection){
    die('Unable to connect to database.');
}