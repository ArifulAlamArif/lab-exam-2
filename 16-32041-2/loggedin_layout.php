<?php
	session_start();
	$p_pic="pic/"."profile.jpg";
	if(isset($_SESSION["name"]) ){
?>
<table width="100%" align="center" cellspacing="0" cellpadding="10" border="1">
    <tr>
        <td colspan="2" valign="middle" height="100">
            <table width="100%">
                <tr>
                    <td>
                        <a href="profile.php">
                            <img height="48" src="<?php if(isset($_COOKIE[$_SESSION["name"]])){echo $_COOKIE[$_SESSION["name"]];}else{echo $p_pic;}?>">
                        </a>
                    </td>
                    <td align="right">
                        Logged in as <a href="profile.php"><?=$_SESSION["name"]?></a>&nbsp;|
                        <a href="logout.php">Logout</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="190" valign="top">
            <b>&nbsp;Account</b><hr />
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="profile.php">View Profile</a></li>
                <li><a href="picture.php">Change Profile Picture</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </td>
        <td valign="top">
            
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>
<?php
	}else{
		echo "Please login first";
	}
?>