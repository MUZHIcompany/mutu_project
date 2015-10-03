
<?php
	session_start();
	include_once("head.html");
    include_once( "Menu.php" ); 
	include_once( "config.php" );
    include_once( "class.php" );
	
    $userid = $_SESSION['user_id'];
	if(!get_magic_quotes_gpc()){
		$userid = addslashes($userid);	
	}
	@ $db = new mysqli('localhost', 'root','123','mutu');
	if(mysqli_connect_errno()){
		echo'Error: we could not connect to the database, please try again later.';
		exit;
	}

	$activitys = "select * from activity ";
	$activitys = mysqli_query($db,$activitys);	
	$num_activitys = mysqli_num_rows($activitys);

//列出活动信息
	for($i = 0; $i< $num_activitys;$i++){
		$row = mysqli_fetch_assoc($activitys);
		echo "<table><div id= \"table\">";
		echo "<p><strong>".($i+1)." : ";
		echo "<strong><br />activitys".($i+1).": </strong>";
		echo"<li><a href=\"ground_detail.php?activity_id=".htmlspecialchars(stripslashes($row['activity_id']))."&user_id=".htmlspecialchars($userid)."\" ><i class='fa fa-envelope-o fa-medium'></i><strong><br />activitys".($i+1).": </strong></a></li>";
			echo "<br />";
		echo "</div></table>";
		echo "</p>";
		echo "<br />";
	}
	
	
	echo"<a href=\"new_activity.html\">创建活动</a>";
	mysqli_free_result($activitys);
    mysqli_close($db);
?>



			</div>	
		</div> <!-- right section -->
	</div>	
</body>
</html>
