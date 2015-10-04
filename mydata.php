
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
//显示用户信息
		$row = mysqli_fetch_assoc($result);
		echo "<div class= \"picture\" align = \"center\">";
		echo" <img id=\"preview\"  src = images/".stripslashes($row['user_picture']).".jpg width=40 height=40 style=\"diplay:none\" /></div>";
		echo "<div id=\"table\"><table>个人信息</table></div>";
		echo "<div id=\"table\" align=\"center\" ><table frame=\"void\" rules=\"rows\" >";
		
		echo "<tr><th>用户注册id</th>";
		echo "<th>".htmlspecialchars(stripslashes($row['user_id']))."</th></tr>";
		echo "<tr><th>姓名: </th>";
		echo "<th>".stripslashes($row['user_name'])."</th></tr>";
		echo "<tr><th><strong>user_description: </strong></th>";
		echo "<th>".stripslashes($row['user_description'])."</th></tr>";
		echo "<tr><th><strong>user_message: </strong></th>";
		echo "<th>".stripslashes($row['user_message'])."</th></tr>";
		echo "</table></div>";
		echo "</p>";
		echo "<br />";
		//显示用户一共参与了多少个小
		echo "<div id=\"table\"><table>我的小组</table></div>";
		for($j = 0; $j<$num_groups;$j++){
			$g_row = mysqli_fetch_assoc($groups);
			echo "<table><div id=\"table\"><strong><br />groups".($j+1).": </strong>";
			echo "<li><a href=\"groups.php?groupid=".stripslashes($g_row['group_id'])."\"><i class='fa fa-envelope-o fa-medium'></i>groups".($j+1)."</li></a></div></table>";
			echo "<br />";
		}
		//显示用户一共参与了多少个活动
		echo "<div id=\"table\"><table>我的活动</table></div>";
		echo "<div id=\"table\"><table>";
		for($k = 0; $k<$num_activitys;$k++){
			$a_row = mysqli_fetch_assoc($activitys);
			echo "<th>";			
			echo"<li>
			<a href=\"ground_detail.php?activity_id=".stripslashes($a_row['activity_id'])."\"><i class='fa fa-envelope-o fa-medium'></i>
			<div id=\"localImag\"><img id=\"preview\" src = images/".stripslashes($a_row['activity_picture']).".jpg width=40 height=40 style=\"diplay:none\" /></div>
			<strong><br />activitys".($k+1).": </strong>
				</a>
			</li>";
			echo stripslashes($a_row['activity_name']);
		echo"</th>";
		}
	echo "<br /></table></div>";
	echo "<div id=\"table\"><table><div class=\"btn btn-lg\"><a href=\"mydata_change.php?user_id=".$userid."\">修改个人信息</a></br></div></table></div>";
	
	echo "<div id=\"table\"><table><div class=\"btn btn-lg\"><a href=\"about.php\">关于沐途</a></div></table></div>";
	
	mysqli_free_result($result);
    mysqli_close($db);
?>

</body>
</html>
