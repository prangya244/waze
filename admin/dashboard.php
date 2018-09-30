<!DOCTYPE html>
<?php
include_once 'config.php';
include_once 'database.php';
?>
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
    <?php 
//if(!isset($_SESSION['username'])){
  //header('Location: login.php');
//}

    
    if (isset($_SESSION['user_logged_in']) AND $_SESSION['user_logged_in'] === true) {
      $sql = "SELECT first_name FROM users WHERE id = " . $_SESSION['logged_in_user_id'] . " LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $user = mysqli_fetch_assoc($result);
      echo "<div>Hello " . $user['first_name'] . "</div>";
      ?>
      
      <?php
    }
  ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" navbar-fixed-top>
  <a class="navbar-brand" href="blog.php">Waze</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class=" nav navbar-nav " style="float: right">
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
  <a href="#" class="list-group-item active">
    Dashboard
  </a>
  <a href="posts.php" class="list-group-item">Posts</a>
  <a href="catagories.php" class="list-group-item">Categories</a>
  <a href="users.php" class="list-group-item">Users</a>
  <a href="pages.php" class="list-group-item">Pages</a>
  <a href="edit-profile.php?id=<?php echo $row['id']?>" class="list-group-item">Edit Profile</a>
</div>
    </div>
    <div class="col-md-9">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
      <h3>New Users</h3>
      <table class="table">
        <thread>
          <tr>
            <th>srl no.</th>
            <th>Date</th>
            <th>Name</th>
            <th>role</th>
          </tr>
          <tr>
            <td>1</td>
            <td>2 feb 2018</td>
            <td>prangya1</td>
            <td>admin</td>
          </tr>
          <tr>
            <td>2</td>
            <td>2 may 2018</td>
            <td>riya1</td>
            <td>user</td>
          </tr>
          <tr>
            <td>3</td>
            <td>2 june 2018</td>
            <td>siya1</td>
            <td>user</td>
          </tr>
          <tr>
            <td>4</td>
            <td>9 feb 2018</td>
            <td>abc1</td>
            <td>user</td>
          </tr>
    </div>
  </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
