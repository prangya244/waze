<?php
include_once 'config.php';
include_once 'database.php';


    
   $sql = "SELECT * FROM posts";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  ?>
    
  </div>

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
  <a href="dashboard.php" class="list-group-item">
    Dashboard
  </a>
  <a href="posts.php" class="list-group-item">Posts</a>
  <a href="#" class="list-group-item active">Categories</a>
  <a href="users.php" class="list-group-item">Users</a>
  <a href="pages.php" class="list-group-item">Pages</a>
  <a href="edit-profile.php?id=<?php echo $row['id']?>" class="list-group-item">Edit Profile</a><br>
  
</div>
    </div>
    <div class="col-md-9">
      <h1>Categories</h1>
      <ol class="breadcrumb">
        <li class="active">Categories</li>
      </ol>
<div class="col-md-8" style="padding-top: 20px;padding-bottom: 20px">
              
              <a href="add_new_categories.php" class="btn btn-primary">Add new category</a>
     </div>
      <?php


$sql = "SELECT DISTINCT category, COUNT(post_title) AS count FROM posts GROUP BY category";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    ?> 
    <table style="border: 1px solid black;">
      <thead>
        <tr>
          <th> Category </th>
          <th>Number of Posts</th>
          
          <th></th>
        </tr>    
      </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['category'] ;  ?></td>
            
            <td><?php echo $row['count']; ?></td>
            <td>
              <a href="view_categories.php?category=<?php echo $row['category'] ?>">Details</a>
              <a href="edit_categories.php?category=<?php echo $row['category'] ?>">Edit</a>
              <a href="delete_categories.php?category=<?php echo $row['category'] ?>" onclick="return confirmDelete()">Delete</a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <?php
  } else {
    echo "No users found!";
  }
  mysqli_close($conn);
  ?>
  <script type="text/javascript">
    function confirmDelete() {
      return confirm('Are you sure to delete?');
    }
  </script>
</body>
</html>
     