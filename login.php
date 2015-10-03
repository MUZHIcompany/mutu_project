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
<?php 

include_once( "config.php" );
include_once( "class.php" );
//include_once( "Menu.php" ); 

$db = new connectDB( $host, $guest, $guestPassword );

if( $_POST['user_id'] )
{
	$id = $_POST['user_id'];
	$pass = $_POST['password'];
	$db->selectDB($BMS);
	$sql = "select * from user where user_id = '{$id}' and user_password = '{$pass}'";
	if( $row = $db->fetchOneRow($sql) )
	{
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_name'] = $row['user_name'];
		$_SESSION['user_password'] = $row['user_password'];
		$_SESSION['user_picture'] = $row['user_picture'];
		$_SESSION['user_description'] = $row['user_description'];
		$_SESSION['user_message'] = $row['user_message'];
		
		$url = "ground.php"; 
		echo "<p><script>alert('登陆成功！欢迎 {$row['user_name']}');</script></p>";
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