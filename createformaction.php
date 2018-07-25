<?php include "connection.php";

if(isset($_POST['submit'])){
    //stores user inputs in variables
    $title=$_POST['title'];
    $description=$POST['descript'];
    $category=$_POST['category'];
    $location=$_POST['location'];
    
    $query = "INSERT INTO posts (post_title,post_content,post_category,location)";
    $query.= "VALUES('$title','$description','$category','$location')";
    
    //return message after post is created
    $result= mysqli_query($connection, $query);
    if($result){
        echo "Your post has been created!";
        } else {
            die('Sorry, we could not create your post.');
        }
}

?>

