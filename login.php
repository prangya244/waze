<?php  
require_once 'config.php';
require_once 'database.php';
include_once 'header_index.php';
$userNameError=$passwordError='';
$password=$username='';


if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username =trim($_POST['username']);
if (empty($username)) {
  $userNameError = " Username is required";
  
}else{
  if(!preg_match("/^[A-Za-z0-9]*$/",$username)){
    $userNameError= "only letters and numbers allowed" ;
  }
}

$password =trim($_POST['password']);
if (empty($password)) {
  $passwordError = " Password is required";
  
}else{
  if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/",$password) ){
    $passwordError= "It must contain atleast one number, one uppercase and one lowercase" ;
  }
}


  $sql = "SELECT id,is_admin FROM users WHERE username = '" . $_POST['username'] . "' AND password = '" . ($_POST['password']) . "' LIMIT 1";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    session_start();
    if($user['is_admin']==1){
    $_SESSION['user_logged_in'] = true;
    $_SESSION['logged_in_user_id'] = $user['id'];
    header('Location:./admin/users.php');
  }else{
    header('Location:./admin/blog.php');
  }
  } else {
    $error = "Username and password does not match!";
  }
}

?>



<body>
  <style>
  input[type=text], select, textarea {
    width: 30%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: content-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
input[type=password], select, textarea {
    width: 30%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: content-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
</style>
  <?php
  if (isset($error)) {
    ?>
    <div class="alert alert-danger">
      <?php echo $error; ?>
    </div>
    <?php
  }
  ?>
  <div class="form" style="padding-left:300px;padding-right: 400px;padding-bottom: 50px;padding-top: 10px">
  <div id="login" style="padding-top: 100px;align-content: center; font-style: Arial;font-size: 25px;background-color: white;padding-right: 10px;padding-left: 10px;padding-bottom: 20px">
  <p><h2 style="font-style: Arial" align="center">LOG IN FORM</h2></p>
  <form action="login.php" method="POST" id = "form" style="padding-left: 10px;padding-right: 10px">
   <p style="padding-left: 150px;padding-top: 20px">
    <label>username:</label>
    <input type="text" name="username" id="username" value="<?php echo $username;?>">
    <?php
    if(isset($userNameError)){
      echo  '<span class="text-danger">*'.$userNameError.'</span>';
    }
    ?>
  </p>
  <p style="padding-left: 150px;padding-top: 10px">
    <label>password:</label>
    <input type="password" name="password" id="password">
    <?php
if(isset($passwordError)){
      echo  '<span class="text-danger">*'.$passwordError.'</span>';
    }
    ?>
  </p>
  <div class="login" style="padding-left: 300px;padding-top: 10px">
   <input type="submit" value="Submit" align="center">
  </p>
  </form>
</div>
</div>
</body>