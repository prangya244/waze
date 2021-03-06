<?php
include_once 'config.php';
include_once 'database.php';
$sql = "SELECT * FROM users";
$result = mysqli_query($conn ,$sql);
$row = mysqli_fetch_array($result);
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
        <li class="active">Posts</li>
      </ol>
     <div class="row">
       <div class="col-sm-8">
         
           <div class="row">
             
    <body>
    	<?php if (isset($message)) { ?>
    <div class="alert alert-success">
      <?php echo $message ?>
    </div>
  <?php } ?>
  <div>
  <?php
  $sql =  "SELECT * FROM posts";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    ?>
  
  
  
    <table style="border: 1px solid black;">
      <thead>
        <tr>
          <th>Title</th>
         
          <th>Category</th>
          <th>Published on</th>
           <th>Author</th>
        </tr>    
      </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['post_title'] . ' '   ?></td>
           
            <td><?php echo $row['category'] . ' '   ?></td>
            <td><?php echo date('d/m/Y', strtotime($row['published_at'])) ?></td>
             <td><?php echo $row['author'] . ' '   ?></td>
            
            <td>
              <a href="view_post.php?id=<?php echo $row['id'] ?>">view</a>
              <a href="edit_post.php?id=<?php echo $row['id'] ?>">Edit</a>
              <a href="delete_post.php?id=<?php echo $row['id'] ?>" onclick="return confirmDelete()">Delete</a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <?php
  } else {
    echo "No posts found!";
  }
  mysqli_close($conn);
  ?>
  <div class="col-md-8" style="padding-top: 20px">
              
              <a href="add-post.php" class="btn btn-primary">Add new post</a>
     </div>
  <script type="text/javascript">
    function confirmDelete() {
      return confirm('Are you sure to delete?');
    }
  </script>
</body>
</html>
