<?php
	session_start();
	$p_pic="pic/"."profile.jpg";
	if(isset($_SESSION["name"]) )
	{
		$conn = mysqli_connect("localhost","root","","reg_login");
		$sql = "select * from user";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				if($row['user_name']==$_SESSION["name"])
				{	
?>
<fieldset>
    <legend><b>PROFILE</b></legend>
	<form>
		<br/>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><?=$row['name']?></td>
				<td rowspan="7" align="center">
					<img width="128" src="<?php if(isset($_COOKIE[$_SESSION["name"]])){echo $_COOKIE[$_SESSION["name"]];}else{echo $p_pic;}?>"/>
                    <br/>
                    <a href="picture.php">Change</a>
				</td>
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?=$row['email']?></td>
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>			
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><?=$row['gender']?></td>
			</tr>
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Date of Birth</td>
				<td>:</td>
				<td><?=$row['dob']?></td>
			</tr>
		</table>	
        <hr/>
        <a href="#">Edit Profile</a>	<br />
		<a href="loggedin_layout.php">Home</a>
	</form>
</fieldset>
<?php
					mysqli_close($conn);
					break;
				}
			}
		}
	}else{
		echo "Please login first";
	}
?>