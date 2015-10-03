
<html>
<body>



</body>
</html>

<?php
	session_start();
	include_once("head.html");
	
	$user_id = $_SESSION['user_id'];
	
	@ $db = new mysqli('localhost', 'root','123','mutu');
	if(mysqli_connect_errno()){
		echo'Error: we could not connect to the database, please try again later.';
		exit;
	}
	
	$query = "select * from user where user_id = '" .$user_id."'";
	
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($result);
	
	echo"<form action = \"change_message.php\" method = \"get\" enctype=\"multipart/form-data\">";
    echo"   <h1 class=\"templatemo-header\">change message:</h1><br />";
    echo"<input type=\"hidden\" name=\"user_id\" value=".$user_id.">";         
    echo"    <h1 >picture:</h1>";
    echo"    <div class=\"form-group\"><input name = \"user_picture\" type = \"file\" size = \"40\" /> </div><br />";
    echo"    name:";
    echo"    <div class=\"form-group\"><input name = \"user_name\" type = \"text\" size = \"40\" value=".stripslashes($row['user_name'])."/></div> <br />";
      echo"  description:";
      echo"  <div class=\"form-group\"><input name = \"user_description\" type = \"text\" size = \"40\" value=".stripslashes($row['user_description'])."/></div> <br />";
       echo" old_password:";
       echo" <div class=\"form-group\"><input name = \"old_password\" type = \"text\" size = \"40\"  /></div><br />";
       echo" new_password:";
       echo"<div class=\"form-group\"><input name = \"new_password\" type = \"text\" size = \"40\" /></div><br />";
       echo" new_password_again:";
       echo"  <div class=\"form-group\"><input name = \"new_password2\" type = \"text\" size = \"40\" /></div> <br />";
       echo"  message: ";
       echo" <div class=\"form-group\"><input name = \"user_message\" type = \"text\" size=\"40\" value=".stripslashes($row['user_message'])."/></div> <br />";
       echo"  <input name = \"submit\" type = \"submit\" value = \"insert\" class = \"btn btn-warning\"/>";
       echo" </form>";
	echo"<!--<a href=\"products.html\" class=\"btn btn-warning\">View Products</a>-->";			
	mysqli_free_result($result);
    mysqli_close($db);
?>

</body>
</html>
