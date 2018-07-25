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
    </head>
    <body>
        <div class="navBar">
            <div class="container-fluid">
                <nav id="titlebar">
                    <h1>INSERT LOGO AND TITLE HERE</h1>
                    <a href="index.php">Login</a>
                    <a href="registration.php">Register</a>
                </nav>
            </div>
        </div>
        <div class="register">
            <form action="registration.php" method="post">
                <fieldset>
                    <legend>Register</legend>
                <input type="text" id="firstname" name="firstname" placeholder="Enter First Name"> <br>
                <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name"> <br>
                <input type="email" id="email" name="email" placeholder="Enter Email"> <br>
                <input type="password" id="password" name="password" placeholder="Enter Password"> <br>
                <input type="submit" value="Submit" name="submit" id="submit">
                </fieldset>
            </form>
        </div>
    </body>
</html>
