<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>登陆</title>
<?php include_once("head.html") ?>
</head>
<body>

<form action="login.php" method = "post">
<table border="0" style="position:relative;left:41%;" >
<tr><th>用户名：</th><td><input name="userID" type="text" required="required" ></td></tr>
<tr><th align="left">密码：</th><td><input name="password" type="password" required="required" ></td></tr>
<tr><td colspan="2" align="center"><input name="submit" type="submit" value="登陆"></td></tr>
</table>
</form>

<?php 

include_once( "config.php" );
include_once( "class.php" );
include_once( "Menu.php" ); 

$db = new connectDB( $host, $guest, $guestPassword );

if( $_POST['userID'] )
{
	$id = $_POST['userID'];
	$pass = $_POST['password'];
	$db->selectDB($BMS);
	$sql = "select * from users where userID = '{$id}' and password = '{$pass}'";
	if( $row = $db->fetchOneRow($sql) )
	{
		$_SESSION['userID'] = $row['userID'];
		$_SESSION['name'] = $row['name'];
		$url = "mydata.php"; 
		echo "<p><script>alert('登陆成功！欢迎 {$row['name']}');</script></p>";
	}
	else
	{
		echo "<p><script>alert('登录失败！用户名或密码不正确');</script></p>";
		$url = "login.php";
	}
	echo "come in {$url}<br />";
	echo "<script LANGUAGE='Javascript'>"; 
	echo "location.href='{$url}'"; 
	echo "</script>";	
}

?>

</body>
</html>