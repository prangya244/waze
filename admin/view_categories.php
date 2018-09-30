<?php  
require_once 'config.php';
require_once 'database.php';

  ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Waze | Admin</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="images/logo.png" rel="icon">
    <link href="database.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" navbar-fixed-top>
  <a class="navbar-brand" href="blog.php">Waze</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class=" nav navbar-nav " style="float: left">
      <li class="nav-item active">
        <a class="nav-link" href="blog.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#profile">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid" style="padding-top: 50px;padding-right: 400px">
  <div class="row">
    <div class="col-md-3">
      <div class="list-group">
  <a href="dashboard.php" class="list-group-item">
    Dashboard
  </a>
  <a href="posts.php" class="list-group-item">Posts</a>
  <a href="catagories.php" class="list-group-item">Categories</a>
  <a href="users.php" class="list-group-item active">Users</a>
  <a href="pages.php" class="list-group-item">Pages</a>
  <a href="edit-profile.php?id=<?php echo $row['id']?>" class="list-group-item">Edit Profile</a>
</div>
    </div>
    <div class="col-md-9">
      <h1>Users</h1>
      <ol class="breadcrumb">
        <li class="active">Users</li>
      </ol>
     <div class="row">
       <div class="col-sm-8">
         
           <div class="row">
             <div class="col-md-8">
              
              <a href="add-user.php" class="btn btn-primary">Add new user</a>
     </div>
			<p id="content" class="column-right" style="margin: 10px 1000px padding-right:100px"></p>

  <?php
  if(isset($_GET['category'])){
    $cat_id = $_GET['category'];
    $cat_query = "SELECT * FROM posts WHERE category = '$cat_id' ";
    $cat_run = mysqli_query($conn, $cat_query);
    
    if(mysqli_num_rows($cat_run)>0){
    
  while($cat_row = mysqli_fetch_array($cat_run)){
  
 
    ?>
    <section style="margin: 10px -80px">
     <span class="first"><h1><?php echo "<div> " . $cat_row['post_title'] . "</div>"; ?></h1></span><br>
     
     <div class="article-info">Posted on <time><?php echo "<div> " . $cat_row['published_at'] . "</div>"; ?></time> by <a href="#" rel="author"><?php echo "<div> " . $cat_row['author'] . "</div>"; ?></a></div>
     <div id="going"><p><?php echo "<div> " . $cat_row['post_content'] . "</div>"; ?></p></div>

			<?php
    }}}?>
    
</body>
</html> 