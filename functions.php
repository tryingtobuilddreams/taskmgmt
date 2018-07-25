<?php

function confirm($result){
    global $connection;
    if(!create_post_query) {
        die("QUERY FAILED");
    }
}

function selectdate(){
    if(isset($_POST['save'])){
    
    $timezone = $_POST['timezone'];
    date_default_timezone_set($timezone);
    echo date("m/d/y H:i");
    } else {
        echo " ";
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        
    </body>
</html>
