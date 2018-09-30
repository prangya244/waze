<?php
require_once 'config.php';
require_once 'database.php';

$firstname='';
$lastname='';
$email='';
$gender='';
$country='';
$addressline1='';
$addressline2='';
$city='';
$state='';
$zip='';
$username='';
$password='';
$createdat='';
$updatedat='';
$dateofbirth='';
$phone='';
$firstNameError = $lastNameError= $emailId = $genderError ='';
$userNameError=$passwordError='';


if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if (isset($_POST['date_of_birth'])) {
    $dateofbirth = $_POST['date_of_birth'];
}

if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
}
if (isset($_POST['created_at'])) {
    $createdat = $_POST['created_at'];
}
if (isset($_POST['updated_at'])) {
    $updatedat = $_POST['updated_at'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['username'])) {
    $username = $_POST['username'];
}
if (isset($_POST['zip'])) {
    $zip = $_POST['zip'];
}
if (isset($_POST['state'])) {
    $state = $_POST['state'];
}
if (isset($_POST['city'])) {
    $city = $_POST['city'];
}
if (isset($_POST['address_line1'])) {
    $addressline1 = $_POST['address_line1'];
}
if (isset($_POST['address_line2'])) {
    $addressline2 = $_POST['address_line2'];
}
if (isset($_POST['country'])) {
    $country = $_POST['country'];
}
 if (empty($_POST["gender"])) {
    $genderError = "Gender is required";
  } else {
    $gender =$_POST["gender"];
  }
$email= trim($_POST['email']);
if (empty($_POST["email"])) {
    $emailId = "*Email is required";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailId = "Invalid email format"; 
    }
  }
$firstname= trim($_POST['first_name']);
if (empty($firstname)){
    $firstNameError = "*First name is required.";
}else{
    if(!preg_match("/^[a-zA-Z]*$/", $firstname)){
        $firstNameError="only letters and white spaces are allowed";
    }
}

$lastname= trim($_POST['last_name']);
if (empty($lastname)){
    $lastNameError = "*Last name is required.";
}else{
    if(!preg_match("/^[a-zA-Z]*$/", $lastname)){
        $lastNameError= "only letters and white spaces are allowed";
    }
}
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
}


$sql="INSERT INTO users(first_name,last_name,email,phone,address_line1,address_line2,city,state,country,zip,gender,username,password,created_at,updated_at,date_of_birth)VALUES('".$firstname."','".$lastname."','".$email."','".$phone."','".$addressline1."','".$addressline2."','".$city."','".$state."','".$country."','".$zip."','".$gender."','".$username."','".$password."','".$createdat."','".$updatedat."','".$dateofbirth."')";

 if (mysqli_query($conn, $sql)) {
      session_start();
      $_SESSION["message"] = "User added successfully";
    echo "User added successfully";
      header('Location: ./admin/users.php');
      exit;
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

?>