<?php
require_once 'config.php';
require_once 'database.php';
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
    <body>
  <?php
  /*if(!isset($_SESSION['username'])){
    header('Location: login.php');
  }
  else if(!isset($SESSION['username']) && $_SESSION['is_admin']==0){
    header('Location: dashboard.php');
  }
  */

    if (isset($_SESSION['user_logged_in']) AND $_SESSION['user_logged_in'] === true) {
      $sql = "SELECT first_name FROM users WHERE id = " . $_SESSION['logged_in_user_id'] . " LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $user = mysqli_fetch_assoc($result);
      echo "<div>Hello " . $user['first_name'] . "</div>";
      ?>
      
      <?php
    }
  ?>
  <?php if (isset($message)) { ?>
    <div class="alert alert-success">
      <?php echo $message ?>
    </div>
  <?php } ?>
  <div>
  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $start = $page * 2 - 2;
  $totalSql = "SELECT COUNT(id) AS total FROM users";
  $totalResult = mysqli_query($conn, $totalSql);
  $totalRow = mysqli_fetch_assoc($totalResult);
  $total = $totalRow['total'];
  $lastPageNumber = ceil($total/USERS_PER_PAGE);

  $sql = "SELECT * FROM users LIMIT " . $start . ", " . USERS_PER_PAGE;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo "Page: " . $page;
    ?>
    <ul class="pagination">
      <?php 
      if ($page != 1) { 
        ?>
        <li class="page-item"><a href="users.php?page=<?php echo $page - 1 ?>" class="page-link">Prev</a></li>
        <?php
      }

      for ($i=1; $i <= $lastPageNumber; $i++) { 
        ?>
        <li class="page-item">
          <a href="users.php?page=<?php echo $i ?>" class="page-link"><?php echo $i ?></a>
        </li>
        <?php
      }
      if ($page != $lastPageNumber) {
        ?>
        <li class="page-item"><a href="users.php?page=<?php echo $page + 1 ?>" class="page-link">Next</a></li>
        <?php
      }
      ?>
    </div>
    </ul>
    <div style="padding-left: 200px;">
    <table style="border: 1px solid black;">
      <thead>
        <tr>
          <th>Name</th>
          <th>DOB</th>
          
          <th></th>
        </tr>    
      </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['first_name'] . ' ' . $row['last_name']  ?></td>
            <td><?php echo date('d/m/Y', strtotime($row['date_of_birth'])) ?></td>
            
            <td>
              <a href="user.php?id=<?php echo $row['id'] ?>">Details</a>
              <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
              <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirmDelete()">Delete</a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
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
