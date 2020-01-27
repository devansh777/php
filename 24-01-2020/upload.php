<?php  
	
	//if(isset($_POST['file']))
	{
	$name=$_FILES['file']['name'];
	$size=$_FILES['file']['size'];
	$temp_name=$_FILES['file']['tmp_name'];
	$extension=substr($name,strpos($name,'.')+1);

	$maxsize=100000;
	echo $extension;
	//if($size>$maxsize)
	{
		echo $name;
		if($extension =='jpg' || $extension=='jpeg')
		{
			
			if(isset($name)){
			$location = 'file/';
			if(move_uploaded_file($temp_name,$location.$name))
			{
				echo "<br>file uploded";
			}
		}
		}
		else
		{
			echo "<br>file is not jpg or jpeg";
		}
		
	}
	
}

?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" name="submit" value="upload">
</form>