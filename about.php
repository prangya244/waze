<?php
include_once 'header.php';
include_once 'config.php';
include_once 'database.php';
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
	<?php
	$sql="SELECT * FROM page ";
	$result = mysqli_query($conn , $sql);
	while($row = mysqli_fetch_assoc($result)){
	$query = " SELECT * FROM page WHERE id = " . $row['id'];}
	$sol = mysqli_query($conn , $query);
	while($row= mysqli_fetch_array($sol)){
		$page_title = $row['page_title'];
		$page_content =$row['page_content'];
		?>
	<h1><?php echo $page_title; ?></h1>
	<p><?php echo $page_content; ?></p>
	<?php
}
	?>