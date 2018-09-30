<?php  
include_once 'config.php';
include_once 'database.php';
$query = "SELECT * FROM page WHERE id = " . $_GET['id'] ;
$sol = mysqli_query($conn , $query);


if (mysqli_num_rows($sol)>0){
  $row = mysqli_fetch_array($sol);

  

if(isset($_POST['submit'])){
	$update =mysqli_query( $conn,"UPDATE pages SET 
  page_title =  '" . $_POST['page_title'] . "' ,
  
  page_content =  '" . $_POST['content'] . "' 

  WHERE id = '" . $_GET['id']."'");


   if ($update){

    
     
      header('Location: pages.php');
      
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
}
 

?>

<h1 style="text-align: center;">EDIT YOUR PAGE</h1><br>
  <h6 class="text-danger" style="margin-left: 500px" >* required field </h6><br>
<form action="" method="POST" id = "registrationForm" style="margin-left: 500px" >
  
  <p>
    <label for= "page_title" id="rom" style="font-weight: bold"> Page Title</label>
    <input type="text" name="page_title"  value="<?php echo $row['page_title']?>" >
   
    
     
    
  </p><br>
  
  <p>
  	<label for= "page_content" id="rom" style="font-weight: bold" > Page Content</label><br>
  <textarea rows="10" cols="50" name="content" ><?php echo $row['page_content']?></textarea>
   
   
    
    
  </p><br>
  
  
  <div> 
  </div><br>
 <label>
      <input type="checkbox" value="terms">
      I agree to the <a href="/terms">terms and conditions</a>
    </label>
  </p><br>
 
  <input type="submit" name="submit" value="Update">
</form>
<hr>



<?php  }else{
  header("Location: pages.php");
}
?>
</body>

