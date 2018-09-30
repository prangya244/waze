<?php
include_once 'header.php';
include_once 'config.php';
include_once 'database.php'
?>
<body>
	<style>
	section .widgets{
		margin-bottom:20px;
		
	}
		.popular{
			background:white;
			padding:20px;
			border-radius: 15px;
		}
		.popular img{
			width: 60%;
			margin: 10px;
		}
		.popular.details{
			margin-left:20px;
		}
		.popular .details p{
			font-size:20px;

		}
		.widgets{
			padding-left: 20px;
			padding-right:500px;
		}
	</style>
	<div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
</div>
<?php
$query = "SELECT * FROM posts " ;
$run = mysqli_query($conn,$query);
if(mysqli_num_rows($run)>0){
while($row= mysqli_fetch_array($run)){
	$post_title = $row['post_title'];
	$post_content = $row['post_content'];
	$category = $row['category'];
	$author = $row['author'];
	$published_at= $row['published_at'];
	?>

<hr>
<div class="widgets">
	<div class="popular">
		<h4>Popular Posts</h4>
		<hr>
		<div class="row">
		
		<div class="col-xs-8">
        <h4 style="padding-left: 10px;padding-right: 100px"><a href="#"><?php echo $post_title; ?></h4>
        <P style="padding-left: 50px"><i class="fa fa-clock-o"><?php echo $published_at; ?></i> by <?php echo $author; ?></P>
        <div><p style="color: black"><?php echo $post_content ?> </p></div>
</div>
</div>
<?php
}}
?>
</body>

