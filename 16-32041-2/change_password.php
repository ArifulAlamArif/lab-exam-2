<?php
	session_start();
	if(isset($_SESSION["name"]) ){
?>
<fieldset>
    <legend><b>CHANGE PASSWORD</b></legend>
    <form action="#" method="POST">
        <table>
            <tr>
                <td><font size="3">Current Password</font></td>
				<td>:</td>
                <td><input type="password" name="cpass" value="" /></td>
                <td></td>
            </tr>
            <tr>
                <td><font size="3" color="green">New Password</font></td>
				<td>:</td>
                <td><input type="password" name="npass" value=""/></td>
                <td></td>
            </tr>
            <tr>
                <td><font size="3" color="red">Retype New Password</font></td>
				<td>:</td>
                <td><input type="password" name="rnpass" value=""/></td>
                <td></td>
            </tr>
        </table>
        <hr />
        <input type="submit" name="submit" value="Submit" />
		<a href="loggedin_layout.php">Home</a>
    </form>
</fieldset>
<?php

	if(isset($_POST["submit"]))
	{
		if(!empty($_POST["cpass"]) && !empty($_POST["npass"]) &&  !empty($_POST["rnpass"]) )
		{
			if($_POST["cpass"]==$_POST["npass"])
			{echo 'New Password should not be same as the Current Password';}
			else if($_POST["npass"]==$_POST["rnpass"])
			{
				$conn = mysqli_connect("localhost","root","","reg_login");
				$sql = "UPDATE user SET password='".$_POST["npass"]."' WHERE user_name=".$_SESSION["name"];
				echo $sql;
				$ret=mysqli_query($conn, $sql);
				mysqli_close($conn);
				//header("Location: loggedin_layout.php");
			}
			else{echo 'New Password must match with the Retyped Password';}
		}
		else{	echo 'Please fill all the fields';	}
	}
?>
<?php
	}else{
		echo "Please login first";
	}
?>