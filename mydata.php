

<?php
	session_start();
	include_once("head.html");
    include_once( "Menu.php" ); 
	include_once( "config.php" );
    include_once( "class.php" );

	$userid = $_SESSION['user_id'];
	$password = $_SESSION['user_password'];

	if(!get_magic_quotes_gpc()){
		$userid = addslashes($userid);	
	}
	@ $db = new mysqli('localhost', 'root','123','mutu');
	if(mysqli_connect_errno()){
		echo'Error: we could not connect to the database, please try again later.';
		exit;
	}
	$query = "select * from user where user_id = '".$userid."'";
	$groups = "select * from user natural join user_group natural join a_group where user_id = '".$userid."'";
	$activitys = "select * from user natural join user_activity natural join activity where user_id = '".$userid."'";
	$groups = mysqli_query($db,$groups);
	$activitys = mysqli_query($db,$activitys);
	
	$num_groups = mysqli_num_rows($groups);
	$num_activitys = mysqli_num_rows($activitys);
	
	
	$result = mysqli_query($db,$query);
	$num_results = mysqli_num_rows($result);
	echo "<p>number of user found: ".$num_results."</p>";
//显示用户信息
	for($i = 0; $i< $num_results;$i++){
		$row = mysqli_fetch_assoc($result);
		echo "<table><div id= \"table\">";
		echo "<p><strong>".($i+1)." : ";
		echo "用户注册id";
		echo htmlspecialchars(stripslashes($row['user_id']));
		echo "<br />姓名: </strong>";
		echo stripslashes($row['user_name']);
		echo "<strong><br />user_picture: </strong>";
		echo stripslashes($row['user_picture']);
		echo "<strong><br />user_description: </strong>";
		echo stripslashes($row['user_description']);
		echo "<strong><br />user_message: </strong>";
		echo stripslashes($row['user_message']);
		echo "</div></table>";
		echo "</p>";
		echo "<br />";
		//显示用户一共参与了多少个小组
		for($j = 0; $j<$num_groups;$j++){
			$g_row = mysqli_fetch_assoc($groups);
			echo "<strong><br />groups".($j+1).": </strong>";
			echo "<li><a href=\"groups.php?groupid=".stripslashes($g_row['group_id'])."\"><i class='fa fa-envelope-o fa-medium'></i>groups".($j+1)."</li></a>";
			echo "<br />";
		}
		//显示用户一共参与了多少个活动
		for($k = 0; $k<$num_activitys;$k++){
			$a_row = mysqli_fetch_assoc($activitys);
			echo "<strong><br />activitys".($k+1).": </strong>";
			echo"<li><a href=\"ground.php?activity_id=".stripslashes($a_row['activity_id'])."\"><i class='fa fa-envelope-o fa-medium'></i><strong><br />activitys".($k+1).": </strong></a></li>";
			echo stripslashes($a_row['activity_name']);
			echo "<br />";
		}

	}
	echo "<a href=\"mydata_change.php?user_id=".$userid."\">修改个人信息</a>";
	
	echo "<a href=\"about.php\">关于沐途</a>";
	
	mysqli_free_result($result);
    mysqli_close($db);
?>

</body>
</html>
