<?php
require_once 'config.php';
require_once 'database.php';


$post_content='';
$category='';
$post_title='';
$published_at='';
$author='';

$published_at='';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if (isset($_POST['post_title'])) {
    $post_title = $_POST['post_title'];
}
if (isset($_POST['author'])) {
    $author = $_POST['author'];
}
if (isset($_POST['published_at'])) {
    $published_at = $_POST['published_at'];
}

if (isset($_POST['category'])) {
    $category = $_POST['category'];
}
if (isset($_POST['post_content'])) {
    $post_content = $_POST['post_content'];
}


$query="INSERT INTO posts(post_title,post_content,published_at)VALUES('".$post_title."','".$post_content."','".$published_at."')";

if (mysqli_query($conn, $query)) {
      session_start();
      $_SESSION["message"] = "Post added successfully";
    echo "Post added successfully";
      header('Location:add-post.php');
      exit;
    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>