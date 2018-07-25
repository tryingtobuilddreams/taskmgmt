<?php include "connection.php";

session_start();
    if(isset($_POST['save'])){
    
    $timezone = $_POST['timezone'];
    date_default_timezone_set($timezone);
    echo date("m/d/y H:i");
    } else {
        echo " ";
    }
    
    if(isset($_POST['subEmail'])){
            
        $query="SELECT * FROM userdb WHERE email='{$_SESSION['email']}'";
        $result=mysqli_query($connection,$query);

        /* stores array values in variables for use in 
         * verification and sessions
         */
        while($row=mysqli_fetch_array($result)){

            $db_company = $row['company'];
            $db_first = $row['firstname'];
            $db_last = $row['lastname'];
            $db_email = $row['email'];
            $db_password = $row['password'];
            

        $newEmail = $_POST['changeEmail'];
        $query2 = "UPDATE userdb SET email='$newEmail'";
        $result2=mysqli_query($connection, $query2);
        
        if(!$result2){
            die("Sorry. We could not update your email.");
        } else {
            echo "Your email has been updated.";
        }
    }
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Settings</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styling.css">
        <link rel="stylesheet" href="css/bootstrap.css">

</head>
    <body>
        <div class="container-fluid">
            <nav id="titlebar">
                <div class="d-flex">
                    <div class="mr-auto p-2"><h2>INSERT LOGO AND TITLE</h2></div>
                    <div class="p-2">
                    <div class="btn-group-lg" role="group">
                        <button type="button" class="btn btn-primary" onclick="location.href='home.php';">Home</button>
                        <button type="button" class="btn btn-primary" onclick="location.href='settings.php';">Settings</button>
                        <button type="button" class="btn btn-danger" onclick="location.href='index.php';">Log Out</button>
                    </div>
                </div>
                </div>
            </nav>
        </div>
<!--                <div class="sidenav">
                    <div class="btn-group-vertical">
                        <button type="button" name="Home" >Home</button>
                        <button type="button" name="Settings" ></button>
                        <button type="button" name="Scheduling" ></button>
                        <button type="button" name="Reports" ></button>
                        <button type="button" name="Contact Us" ></button>
                        <button type="button" name="Log Out" ></button>
                    </div>
                </div>-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <form action="settings.php" method="post">
                        <div class="form-group">
                            <select name="timezone" id="timezone">
                                <option value="America/Chicago">Central</option>
                                <option value="America/New_York">Eastern</option>
                                <option value="America/Denver">Mountain</option>
                                <option value="America/Phoenix">Mountain (no DST)</option>
                                <option value="America/Los_Angeles">Pacific</option>
                                <option value="America/Anchorage">Alaska</option>
                                <option value="America/Adak">Hawaii</option>
                                <option value="Pacific/Honolulu">Hawaii (no DST)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="save" id="save">Save</button> <br>
                            <button type="button" name="edit" id="edit">Edit</button> <br>
                        </div>
                        <div class='form-group'>
                            <div class="currentCredentials">
                                <p>Email: <?php echo $_SESSION['email'];?></p>
                                <p>First name: <?php echo $_SESSION['fname'];?></p>
                                <p>Last name: <?php echo $_SESSION['lname'];?></p> 
                            </div>
                            <div class="editInfo" id="editInfo">
                                <label for="changeEmail">Email Address</label>
                                <input type="text" name="changeEmail" id="changeEmail" placeholder="Enter New Email"> 
                                <button type="submit" name="subEmail" id="subEmail">Edit Email</button><br>
                                <input type="text" name="changeFirst" id="changeFirst" placeholder="New First Name"> 
                                <button type="submit" name="subFirst" id="subFirst">Edit First Name</button><br>
                                <input type="text" name="changeLast" id="changeLast" placeholder="New Last Name">
                                <button type="submit" name="subLast" id="subLast">Edit First Name</button><br>
                                <input type="password" name="changePassword" id="changePassword" placeholder="Enter New Password">
                                <button type="submit" name="subPassword" id="subPassword">Edit First Name</button>
                             </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>