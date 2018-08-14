<?php include "connection.php";

 session_start();
if(isset($_POST['submit'])){
    //stores user inputs in variables
    $author=$_SESSION['fname'];
    $title=$_POST['title'];
    $description=$_POST['descript'];
    $category=$_POST['category'];
    $location=$_POST['location'];
    $date=date("Y-m-d h:i");
    
    $query = "INSERT INTO posts (post_author,post_title,post_date,post_content,post_category,location)";
    $query.= "VALUES('$author','$title','$date','$description','$category','$location')";
    
    //return message after post is created
    $result= mysqli_query($connection, $query);
    if($result){
        echo "Your post has been created!";
        } else {
            die('Sorry, we could not create your post.');
        }
    //function to create user posts
     
        
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <!-- adjusts web site size to that of device -->
        <meta name="viewport" content="width=device-width, initial scale=1"> 
        <!-- JS functionality -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Bootstrap styling -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="styling.css">

    </head>
    <body>
        <!-- This is the navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav-main">
          <a class="navbar-brand" href="#">Insert Logo</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="settings.php">Settings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">Logout</a>
              </li>
            </ul>
          </div>
        </nav>
        <!-- This is the main post display --> 
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <nav id="post-display">
                         <!-- query selects all posts  -->
                        <?php
                            // sorts posts by descending post keys. Works because keys auto increment.
                            if(isset($_GET['order'])) {
                                $order = $_GET['order'];
                            } else {
                                $order = 'post_id';
                            }
                            if(isset($_GET['sort'])){
                                $sort = $_GET['sort'];
                            } else {
                                $sort = 'DESC';
                            }
                            
                            $posts_query = "SELECT * FROM posts ORDER BY $order $sort";
                            $select_posts = mysqli_query($connection, $posts_query);
                            
                            

                            while($row=mysqli_fetch_assoc($select_posts)){
                            
                                $author=$row['post_author'];
                                $category=$row['post_category'];
                                $title=$row['post_title'];        
                                $date=$row['post_date'];        
                                $content=$row['post_content'];
                                $location=$row['location'];
                            
                                
                        ?>

                         <!--Posts are formatted using bootstrap cards. Php variables are
                        added by using the while loop. -->
                        

                         
                         
                         
                         
                         
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo "$title"; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo "$content"; ?></h6>
                            <div class="card-footer text-muted">
                                <table>
                                    <tbody>
                                        <td><?php echo "$date"?></td>
                                        <td><?php echo "$author" ?></td>
                                        <td><?php echo "$location" ?></td>
                                        <td><?php echo "$category" ?></td>
                                        <td>
                                            <form action="home.php" method="get">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="resolveCheck" id="resolveCheck"> 
                                                    <label for="resolveCheck">Resolved</label> <br>
                                                </div>
                                            </form>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                         
                            <?php } ?>
                    </nav>
                </div>
                <div class="col-md-4">
                    <!-- Form for creating a new post -->
                    
                    
                    <form action="home.php" method="post">
                        <div class="form-group">
                        <fieldset>
                            <legend> Create Post</legend>
                                    <input class="form-control" type="text" name="title" id="title" placeholder="Title (Max 30 characters)">
                                    <textarea class="form-control" name="descript" id="descript" placeholder="Description (Max 500 characters)"></textarea>
                            
                            <select class="custom-select" name="category">
                                <option value="Admin">Administrative</option>
                                <option value="Boot">Boot</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Pay Station">Pay Station</option>
                                <option value="Rates">Rates</option>
                            </select>
                            <select class="custom-select" name="location">
                                <option value="001">N/A</option>
                                <option value="101">101</option>
                                <option value="103">103</option>
                                <option value="105">105</option>
                                <option value="106">106</option>
                                <option value="107">107</option>
                                <option value="109">109</option>
                                <option value="111">111</option>
                                <option value="113">113</option>
                                <option value="116">116</option>
                                <option value="117">117</option>
                                <option value="119">119</option>
                                <option value="120">120</option>
                                <option value="122">122</option>
                                <option value="123">123</option>
                                <option value="129">129</option>
                                <option value="130">130</option>
                                <option value="131">131</option>
                                <option value="132">132</option>
                                <option value="133">133</option>
                                <option value="133-3">133-3</option>
                                <option value="134">134</option>
                                <option value="135">135</option>
                                <option value="136">136</option>
                                <option value="140">140</option>
                                <option value="142">142</option>
                                <option value="143">143</option>
                                <option value="144">144</option>
                                <option value="146">146</option>
                                <option value="147">147</option>
                                <option value="148">148</option>
                                <option value="149">149</option>
                                <option value="150">150</option>
                                <option value="151">151</option>
                                <option value="152">152</option>
                                <option value="153">153</option>
                                <option value="154">154</option>
                                <option value="201">201</option>
                                <option value="202">202</option>
                            </select>
                            <button class="btn btn-secondary col-12" type="submit" name="submit" id="submit">Create Post</button>
                        </fieldset>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    <!-- link to javascript file -->    
    <script type="text/javascript" src="script.js">
    </script>
    </body>
</html>
