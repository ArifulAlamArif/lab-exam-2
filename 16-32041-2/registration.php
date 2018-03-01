<fieldset>
    <legend><b>REGISTRATION</b></legend>
	<form action="#" method="POST">
		<br/>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input name="name" type="text" value=""></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text" value="">
					<abbr title="hint: sample@example.com"><b>i</b></abbr>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>User Name</td>
				<td>:</td>
				<td><input name="uname" type="text" value=""></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input name="pass" type="password" value=""></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Confirm Password</td>
				<td>:</td>
				<td><input name="cpass" type="password" value=""></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Gender</legend>    
						<input name="gender" type="radio" value="male">Male
						<input name="gender" type="radio" value="female">Female
						<input name="gender" type="radio" value="other">Other
					</fieldset>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Date of Birth</legend>    
						<input type="text" size="2" name="date" min="1" max="31" value=""/>/
						<input type="text" size="2" name="month" min="1" max="12" value=""/>/
						<input type="text" size="4" name="year" min="1960" max="1998" value=""/>
						<font size="2"><i>(dd/mm/yyyy)</i></font>
					</fieldset>
				</td>
				<td></td>
			</tr>
		</table>
		<hr/>
		<input type="submit" name="submit" value="Submit">
		<input type="reset" >
	</form>
</fieldset>
<?php
if(isset($_POST['submit']))
{
	if(empty($_POST['name']))
	{echo "Name can't be empty.";}
	else if(empty($_POST['email']))
	{echo "Email can't be empty.";}
	else if(empty($_POST['uname']))
	{echo "Username can't be empty.";}
	else if(empty($_POST['pass']) || empty($_POST['cpass']))
	{echo "Password can't be empty.";}
	else if(empty($_POST['date']) || empty($_POST['month']) || empty($_POST['year']))
	{echo "DOB can't be empty.";}
	else if(empty($_POST['uname']))
	{echo "Username can't be empty.";}
	else if(empty($_POST['gender']))
	{echo "Gender can't be empty.";}
	else if($_POST['pass'] != $_POST['cpass'])
	{echo "Password and Confirm password not matched.";}
	else
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$dob = "(".$_POST['date']."/".$_POST['month']."/".$_POST['year'].")";
		$gender = $_POST['gender'];
		$conn = mysqli_connect("localhost","root","","reg_login");
		$sql = "insert into user values('".$name."','".$email."','".$uname."','".$pass."','".$gender."','".$dob."')";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		if($result){
			header("Location: login.php");
		}else{
			echo "<br/> SQL Error<br/>".mysqli_error($conn);
		}
	}
}
?>