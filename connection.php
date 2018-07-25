<?php
//establishes connection to database containing user information
$connection=mysqli_connect("localhost","root","","taskmgmt");
if(!$connection){
    die('Unable to connect to database.');
}