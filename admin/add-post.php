<?php
include_once 'config.php';
include_once 'database.php';
include_once 'process1.php';
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){

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
    <style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}

@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
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
  <a href="posts.php" class="list-group-item active">Posts</a>
  <a href="catagories.php" class="list-group-item">Categories</a>
  <a href="users.php" class="list-group-item">Users</a>
  <a href="pages.php" class="list-group-item">Pages</a>
  <a href="edit-profile.php?id=<?php echo $row['id']?>" class="list-group-item">Edit Profile</a>
</div>
    </div>
    <div class="col-md-9">
      <h1>Posts</h1>
      <ol class="breadcrumb">
        <li class="active"> Add Posts</li>
      </ol>
     <div class="row">
       <div class="col-sm-8">
         
           <div class="row">
<div class="container">
  <form method="POST" action="add-post.php">
    <div class="row">
      <div class="col-25">
        <label for="title">TITLE</label>
      </div>
      <div class="col-75">
        <input type="text" id="title" name="post_title" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="content">Content</label>
      </div>
      <div class="col-75">
        <textarea id="content" name="post_content" style="height:200px" ></textarea>
      </div>
    
    
    <div>
      <label>
        publish date:
        <input type="date" name="published_at" >
      </label>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
  <?php
}
?>
</div>





