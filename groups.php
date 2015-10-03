

<?php
	session_start();
	include_once("head.html");
    include_once( "Menu.php" ); 
	include_once( "config.php" );
    include_once( "class.php" );
	$groupid = trim($_GET['groupid']);
	
	if(!get_magic_quotes_gpc()){
		$groupid = addslashes($groupid);	
	}
	@ $db = new mysqli('localhost', 'root','123','mutu');
	if(mysqli_connect_errno()){
		echo'Error: we could not connect to the database, please try again later.';
		exit;
	}
	$groups = "select * from a_group where group_id = '".$groupid."'";
	$groups = mysqli_query($db,$groups);	
	$num_groups = mysqli_num_rows($groups);
//	echo "<p>number of user found: ".$num_groups."</p>";
//显示用户信息
	for($i = 0; $i< $num_groups;$i++){
		$row = mysqli_fetch_assoc($groups);
		echo "<table><div id= \"table\">";
		echo "<p><strong>".($i+1)." : ";
		echo "<br />小组名称: </strong>";
		echo stripslashes($row['group_name']);
		echo "<strong><br />发起人: </strong>";
		echo stripslashes($row['group_organizer']);
		echo "<strong><br />小组介绍: </strong>";
		echo stripslashes($row['group_describe']);
		echo "<strong><br />备注: </strong>";
		echo stripslashes($row['group_remark']);
		echo "<strong><br />最大组员数: </strong>";
		echo stripslashes($row['group_num_total']);
		echo "<strong><br />现在组员数: </strong>";
		echo stripslashes($row['group_num_now']);
		echo "<strong><br />小组头像: </strong>";
		echo"<div id=\"localImag\"><img id=\"preview\" src = ".stripslashes($row['group_picture'])." width=40 height=40 style=\"diplay:none\" /></div>";
		echo "</div></table>";
		echo "</p>";
		echo "<br />";
	}
	mysqli_free_result($groups);
    mysqli_close($db);
?>



			</div>	
		</div> <!-- right section -->
	</div>	
</body>
</html>
