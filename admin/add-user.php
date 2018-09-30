<?php  
require_once 'config.php';
require_once 'database.php';
include_once 'process.php';
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
    <style>
      input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
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
  <a href="posts.php" class="list-group-item">Posts</a>
  <a href="catagories.php" class="list-group-item">Categories</a>
  <a href="users.php" class="list-group-item active">Users</a>
  <a href="pages.php" class="list-group-item">Pages</a>
  <a href="edit-profile.php?id=<?php echo $row['id']?>" class="list-group-item">Edit Profile</a>
</div>
    </div>
<div style="padding-left: 200px">
  <p align="center" style="font-size:30px;font-style:Arial">ADD USER HERE</p>
  <form method="POST" action="add-user.php" id="registrationForm" style="padding-left: 100px;padding-top: 50px;padding-bottom: 50px;background-color: pink;padding-right: 100px">
      
  <div>
    <label for= "firstname">First name :<span class="text-danger">*</span></label>
    <input type="text" name="first_name" id="firstname" maxLength="10" value="<?php echo $firstname;?>">
    <?php
    if(isset($firstNameError)){
      echo  '<span class="text-danger">'.$firstNameError.'</span>';
    }
    ?>
  </div>
  <div>
    
    <label for= "lastname">Last name :<span class="text-danger">*</span></label>
    <input type="text" name="last_name" id="lastname" placeholder="last name" maxLength="10" value="<?php echo $lastname;?>"> 
 <?php
    if(isset($lastNameError)){
      echo '<span class="text-danger">' .$lastNameError .'</span>';
    }
    ?>
  </div>
  <div>
    <label for="mail">Email Id :<span class="text-danger">*</span></label>
    <input type="text" name="email" id="mail" placeholder="example@example.com" value="<?php echo $email;?>">
    <?php
    if(isset($emailId)){
      echo  '<span class="text-danger">' .$emailId .'</span>';
    }
    ?>
  </div>
  <div style="padding-top: 10px">
    <label for="phone">phone :</label>
    <input type="number" name="phone" id="phone" style="padding-right: 40px">
  </div>
  <div>
  
  <label> Gender:</label><span class="text-danger">*</span>
  <label><input type="radio" name="gender">Male</label>
    <label>
      <input type="radio" name="gender">Female</label>
    <label> <input type="radio" name="gender">Other</label>
<?php
if(isset($genderError)){
    echo  '<span class="text-danger">' .$genderError .'</span>';
  }
  ?>
</div>
<div>
  
    <label>Country:</label>
    <input type="text" name="country" id="country">

</div>

<div>
    <label>address line1:</label>
    <input type="text" name="address_line1" id="addressline1" placeholder="address">
  </div>
  <div>
    <label>address line2:</label>
    <input type="text" name="address_line2" id="addressline2" placeholder="address">
  </div>
  <div>
    <label>city:</label>
    <input type="text" name="city" id="city">
  </div>
  <div>
    <label>state:</label>
    <input type="text" name="state" id="state">
  </div>
  <div>
    <label>zip:</label>
    <input type="text" name="zip" id="zip">
  </div>
  <div>
    <label>username:<span class="text-danger">*</span></label>
    <input type="text" name="username" id="username" value="<?php echo $username;?>">
    <?php
    if(isset($userNameError)){
      echo  '<span class="text-danger">'.$userNameError.'</span>';
    }
    ?>
  </div>
  <div style="padding-top: 20px;padding-bottom: 20px">
    <label>password:</label>
    <div>
    <input type="password" name="password" id="password" style="padding-right: 100px">
    <?php
if(isset($passwordError)){
      echo  '<span class="text-danger">*'.$passwordError.'</span>';
    }
    ?>
  </div>
  </div>
  <div>
    <label>date of birth:</label>
    <input type="date" name="date_of_birth" id="dateofbirth">
  </div>
  <div>
   <input type="submit" value="Submit" class="btn btn-primary">
</div>
</div>
</form>
</body>
   