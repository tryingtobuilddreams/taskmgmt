<?php include "connection.php";

 session_start();

 
if(isset($_POST['submit'])){
    
    $company = $_POST['company'];
    $email=$_POST['email'];
    $password=$_POST['password'];
     
    //password encryption for unhashing the user input password
    $hashFormat = "$2y$10$";
    $salt = "thequickbrownfoxjumpedoverthelazydog";
    $hashF_and_salt = $hashFormat . $salt;
    
    $encrypt_password = crypt($password,$hashF_and_salt);
    
    //selects user with matching emails
    $query="SELECT * FROM userdb WHERE email='$email' && company='$company'";
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
        
        
        //session variable storing the users name for later use
        $_SESSION['fname']=$db_first;
        $_SESSION['lname']=$db_last;
        $_SESSION['company']=$db_company;
        $_SESSION['email']=$db_email;
        
        if(password_verify($password,$db_password)){
             header("location: home.php");
        } else {
            die('Login could not be verified');
        }
        
    } 

}


?>
    
        


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="landingpages.css">
    </head>
    <body>

<!-- Navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav-main">
          <a class="navbar-brand" href="#">Insert Logo</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Login<span class="sr-only">(current)</span></a>
              </li>
              
              
              <!-- Dead link, requires content -->
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              
              
              <!-- Dead link, requires content -->
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              
              
              <li class="nav-item">
                  <a class="nav-link" href="registration.php">Register</a>
              </li>
            </ul>
          </div>
        </nav>
    
<div class="container">
    <div class="row">
        <div class="col-md-3">
            
        </div>
            <div class="card col-md-6">
                <div class="card-header" align="center">
                    Login
                </div>
                <div class="card-body">
                    <form action="index.php" method="post">
                        <div class="form-row">
                            <div class="col">
                            </div>
                            <div class="col">
                        <input type="text" class="form-control" id="company" name="company" placeholder="Company Id">
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                        
                        
                        <!-- ALTERNATE FORM FIELDS -->
                        
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                        <input type="submit" class="btn col-12" value="Submit" name="submit" id="submit">
                    </form>
                        <!-- Original button --> 
                        <!-- <button type="button" class="btn btn-link col-12">Alternate Sign-In</button> -->
                        <button type="button" class="btn btn-link col-12">Alternate Sign-In</button>
                </div>
            </div>
        <div class="col-md-3">
    
        </div>
    </div>
</div>
    </body>
</html>
