<?php 
  include('dbcon.php');

  if(isset($_POST['submit'])){
  	$file_name= $_FILES['image']['name'];
  	$temp_name= $_FILES['image']['tmp_name'];
  	$folder = 'images/'.$file_name;
    $query = mysqli_query($con, "Insert into uploads (imagename,filepath) VALUES ('$file_name','$folder')");
    if(move_uploaded_file($temp_name,$folder)){
    	echo '<h2> uploaded successfully</h2>';
    }else{
    	echo '<h2> Not uploaded</h2>';
    }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form method="post" enctype="multipart/form-data">
	<input type="FILE" name="image" >
	<br/>
	<button type="submit"  name="submit">submit</button>
	<div>
		<?php 
			$res = mysqli_query($con,"select * from uploads order by id desc limit 1");
			while($row= mysqli_fetch_assoc($res)){
		?>
		<img src="images/<?php echo $row['imagename']; ?> ">
	<?php }?>
	</div>
</form>
</body>
</html>
