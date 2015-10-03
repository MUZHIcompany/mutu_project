
<html>
<body>

<?php
	session_start();
	include_once("head.html");
    include_once( "Menu.php" ); 
	include_once( "config.php" );
    include_once( "class.php" );
	//insert a book
	$user_id = trim($_GET['user_id']);
	$picture = trim($_GET['user_picture']);
	$name = trim($_GET['user_name']);
	$description = trim($_GET['user_description']);
	$old_password = trim($_GET['old_password']);
	$new_password = trim($_GET['new_password']);
	$new_password2 = trim($_GET['new_password2']);
	$message = trim($_GET['user_message']);
	
	echo $name;
	echo $user_id;
	echo $message;
	
	if(!$name){
		echo'you have not entered name. Please go back and try again.';
		exit;
	}
	
	if(!get_magic_quotes_gpc()){
		$name = addslashes($name);	
		$description = addslashes($description);
		$old_password = addslashes($old_password);
		$new_password = addslashes($new_password);
		$new_password2 = addslashes($new_password2);
		$message = addslashes($message);
	}
	@ $db = new mysqli('localhost', 'root','123','mutu');
	if(mysqli_connect_errno()){
		echo'Error: we could not connect to the database, please try again later.';
		exit;
	}
	
		$query = "update user set user_name = '".$name."' where user_id = '".$user_id."'";
		$result = mysqli_query($db,$query);
		if($old_password){
			$query_pass = "select * from user where user_id = '".$user_id."' and user_passward= '".$old_password."'";
			$result_pass = mysqli_query($db,$query_pass);
			$num_results = mysqli_num_rows($result_pass);
			if($num_results>0){
				if($new_password = $new_password2){
					$query_changep = "update user set user_passward = '".$new_password."' where user_id = '".$user_id."'";
					$result_changep = mysqli_query($db,$query_changep);
				}
				else{
					echo"the two newpassword isn't same!!!!!!!";	
					exit;
				}
			
			}
			
		else{
			echo "the user isn't exist or the password is wrong!!!";
			exit;
			}
		}
		if($description){
			$query3 = "update user set user_description = '".$description."' where user_id = '".$user_id."'";
			$result3 = mysqli_query($db,$query3);
		}
		if($message){
			$query4 = "update user set user_message = '".$message."' where user_id = '".$user_id."'";
			$result4 = mysqli_query($db,$query4);
		}
		echo "update successfully";
    mysqli_close($db);
?>