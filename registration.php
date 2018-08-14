<?php 
//connects to database
$connection=mysqli_connect("localhost","root","","taskmgmt");
if(!$connection){
    die('Unable to connect to database.');
}

if(isset($_POST['submit'])){
    
// stores user inputs in variables
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $confirmEmail=$_POST['confirmEmail'];
    $password=$_POST['password'];
    
    
    //encrypts the password
    $hashFormat = "$2y$10$";
    $salt = "thequickbrownfoxjumpedoverthelazydog";
    $hashF_and_salt = $hashFormat . $salt;
    $encrypt_password = crypt($password,$hashF_and_salt);
    
    
    //checks if email is already taken
    $emailChecker = "SELECT * FROM userdb WHERE email='$email'";
    $rEmailChecker = mysqli_query($connection,$emailChecker);
    if($email===$rEmailChecker){
        die('Email already exists. Please try another email.');
    } else {
    
    //inserts user into the database
    $query = "INSERT INTO userdb (firstname,lastname,email,password)";
    $query.= "VALUES('$firstname','$lastname','$email','$encrypt_password')";
    
    //return message after if user is created
    $result= mysqli_query($connection, $query);
    if($result){
        echo "user created";
        } else {
            die('Email already exists. Please try another email.');
        }
}
}
?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="landingpages.css">
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
              
              
              <li class="nav-item active">
                  <a class="nav-link" href="registration.php">Register</a>
              </li>
            </ul>
          </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- empty column for spacing -->
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" align="center">
                            Register
                        </div>
                    <div class="card-body">
                        <form action="registration.php" method="post">
                            <div class="form-row">
                                <div class="col">
                            <input type="text" class="form-control" id="firstname" name="firstName" placeholder="Enter First Name">
                                </div>
                                <div class="col">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
                                </div>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                            <input type="email" class="form-control" id="confirmEmail" name="confirmEmail" placeholder="Confirm Email">
                            <input type="submit" class="btn col-12" value="Submit" name="submit" id="submit">
                            
                            
                        </form>
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- empty column for spacing -->
                </div>
            </div>
        </div>
    </body>
</html>
