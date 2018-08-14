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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav-main">
          <a class="navbar-brand" href="#">Insert Logo</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
              </li>
              <!-- Dead link, requires content -->
              <li class="nav-item active">
                <a class="nav-link" href="settings.php">Settings</a>
              </li>
              <!-- Dead link, requires content -->
              <li class="nav-item">
                <a class="nav-link" href="index.php">Logout</a>
              </li>
              
            </ul>
          </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <!-- empty column --> 
                </div>
                <!-- main content area -->
                <div class="col-md-6">
                        
                    <form action="settings.php" method="post">
                        <!-- displays current user credentials -->
                        
                            <div class="card">
                                <div class="card-header">
                                    Account Information
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></td>
                                            <td><button type="button" class="btn btn-link" id="nameEdit">Edit</button></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $_SESSION['email']; ?></td>
                                            <td><button type="button" class="btn btn-link" id="emailEdit">Edit</button></td>
                                        </tr>
                                        <tr>
                                            <td>Time Zone</td>
                                            <td>Time Zone from Database</td>
                                            <td><button type="button" class="btn btn-link">Edit</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        
                            <!-- lets user change the timezone -->
                        <div class="card">
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
                    </form>
                    </div>
                <div class="col-md-4">
                    <!-- empty column row -->
                </div>
                </div>
        </div>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>