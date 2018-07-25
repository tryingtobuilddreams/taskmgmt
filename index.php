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
        <div class="container">
            <div class="jumbotron">
                <form action="index.php" method="post">
                    <fieldset>
                        <legend>Login</legend>
                        <input type="number" id="company" name="company" placeholder="Company Id"><br>
                        <input type="email" id="email" name="email" placeholder="Enter Email"> <br>
                        <input type="password" id="password" name="password" placeholder="Enter Password"> <br>
                        <input type="submit" value="Submit" name="submit" id="submit">
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>
