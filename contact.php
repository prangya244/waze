<?php
include_once 'header.php';
include_once 'process.php';
?>
<body>
	<body>
	<style>
	body{
		background: linear-gradient(to bottom right);height: 600px;
	}
	.right{
		right: 0;
		padding-top: 0px;
	}
	.left{
  left: 50%;
  
}
.bodyx{
	
	left: 400px;
	top:80px;
	width: 50%
	height:600px;
  padding-bottom: 50px;
  padding-right: 520px;
  padding-left: 350px;
  padding-top: 10px;
}

#intro2{
	top: 40px;
	left:500px;
	height:60px;
    width:500px;
}
#img2{
	top:130px;
	left:100px;
	height:250px;
	width:300px;
}
input[type=text], select, textarea {
    width: 60%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: content-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    padding-left: 20px;
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
#form{
	top: :150px;
	left: 700px;
	width: 450px;
	height: 495px;
}

	</style>
	<div style="padding-top: 30px;">
	<div class="bodyx">
	<div id="intro1">

<p style="padding-left: 100px;padding-top: 70px;font-family: Arial;font-size: 20px;padding-bottom: 50px"><h2>Know everything happening around you! </h2></p>

	<img src="images/logo.png" align="left" style="padding-top: 80px;padding-left:160px;padding-bottom: 40px">
</div>
	<form style="padding-left: 50px;padding-top: 10px;padding-bottom: 50px;background-color: white;padding-right: 50px">
  <form method="POST" action="contact.php" id="registrationForm">
  	<h2 style="padding-left: 150px;padding-right: 50px;padding-top: 20px">CONTACT US</h2>
      
  <div>
    <label for= "firstname">First name :</label>
    <input type="text" name="first_name" id="firstname" maxLength="10" value="<?php echo $firstname;?>">
    <?php
    if(isset($firstNameError)){
      echo  '<span class="text-danger">*'.$firstNameError.'</span>';
    }
    ?>
  </div>
  <div>
    
    <label for= "lastname">Last name :</label>
    <input type="text" name="last_name" id="lastname" placeholder="last name" maxLength="10" value="<?php echo $lastname;?>"> 
 <?php
    if(isset($lastNameError)){
      echo '<span class="text-danger">*' .$lastNameError .'</span>';
    }
    ?>
  </div>
  <div>
    <label for="mail">Email Id :</label>
    <input type="text" name="email" id="mail" placeholder="example@example.com" value="<?php echo $email;?>">
    <?php
    if(isset($emailId)){
      echo  '<span class="text-danger">*' .$emailId .'</span>';
    }
    ?>
  </div>
  <div>
    <label for="phone">phone :</label>
    <input type="number" name="phone" id="phone">
  </div>
  
<div>
  
    <label>Country:</label>
    <input type="text" name="country" id="country">

</div>

<div>
	<label>Messsage:</label>
</div>
<div>
	 <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
  </div>
  <div>
   <input type="submit" value="Submit">

<a href="#" style="color:dodgerblue;">Terms & conditions applied</a>
</div>
</div>
</form>
</div>
</div>
</div>
</body>

