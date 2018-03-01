<?php
	session_start();
	$p_pic="pic/"."profile.jpg";
	if(isset($_POST['submit']))
	{
		$filename = $_FILES['myfile']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		//echo "EXTENSION: ".$ext."</br>";
		$fileUploadPath = "pic/".$_SESSION["name"].".".$ext;
		//echo $fileUploadPath."</br>";
		//echo "ERROR: ".$_FILES['myfile']['error']."</br>";
		if(move_uploaded_file($_FILES['myfile']['tmp_name'],$fileUploadPath))
		{
			setcookie($_SESSION["name"], $fileUploadPath, time()+(24*60*60*365), "/");
		}
	}
	if(isset($_SESSION["name"]) ){
?>
<fieldset>
    <legend><b>PROFILE PICTURE</b></legend>
    <form form action="#" method="POST" enctype="multipart/form-data">
        <img width="128" src="<?php if(isset($_COOKIE[$_SESSION["name"]])){echo $_COOKIE[$_SESSION["name"]];}else{echo $p_pic;}?>" />
        <br />
        <input type="file" name="myfile" accept=".jpg, .jpeg, .png"/>
        <hr />
        <input type="submit" name="submit" value="Submit">
		<br />
		<a href="loggedin_layout.php">Home</a>
    </form>
</fieldset>
<?php
	}else{
		echo "Please login first";
	}
?>