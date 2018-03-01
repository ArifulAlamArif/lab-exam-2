<fieldset>
    <legend><b>LOGIN</b></legend>
    <form action="#" method="POST">
        <table>
            <tr>
                <td>User Name</td>
				<td>:</td>
                <td><input type="text" name="uname" value="<?php if(isset($_COOKIE['name'])){echo $_COOKIE["name"];}?>"></td>
            </tr>
            <tr>
                <td>Password</td>
				<td>:</td>
                <td><input type="password" name="pass" value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE["pass"];}?>"></td>
            </tr>
        </table>
        <hr />
		<input name="rem" value="me" type="checkbox" >Remember Me
		<br/><br/>
        <input type="submit" name="login" value="Login">        
		<a href="forgot_password.html">Forgot Password?</a>
    </form>
</fieldset>
<?php
session_start();
if(isset($_POST['login']))
{
	if(empty($_POST['pass']))
	{echo "Password can't be empty.";}
	else if(empty($_POST['uname']))
	{echo "Username can't be empty.";}
	else
	{
		$uname=$_POST['uname'];
		$pass = $_POST['pass'];
		$conn = mysqli_connect("localhost","root","","reg_login");
		$sql = "select * from user";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				if($row['user_name']==$uname && $row['password']==$pass)
				{
					$_SESSION["name"]= $row['user_name'];
					header("Location: loggedin_layout.php");
					mysqli_close($conn);
					if(!empty($_POST["rem"]))
					{
						setcookie("name", $uname, time()+(24*60*60*30), "/");
						setcookie("pass", $pass, time()+(24*60*60*30), "/");
					}
					break;
				}
			}
			echo "You are not registered..";
		}		
	}
}
?>