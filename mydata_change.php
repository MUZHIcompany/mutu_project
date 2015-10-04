
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
	echo"<div class=container>";
	echo"<form action = \"change_message.php\" method = \"get\" enctype=\"multipart/form-data\">";
    echo"   <h1 class=\"templatemo-header\">change message:</h1><br />";
    echo"<input type=\"hidden\" name=\"user_id\" value=".$user_id.">";         
    echo"    <label for=\"name\">picture:</label>";
    echo"    <div class=\"form-group\"><input class=\"btn btn-warning\" name = \"user_picture\" type = \"file\" /> </div><br />";
    echo" <label for=\"name\">   name:</label>";
    echo"    <div class=\"form-group\"><input class=\"form-control\" name = \"user_name\" type = \"text\" size = \"40\" value=".stripslashes($row['user_name'])."/></div> <br />";
      echo"<label for=\"name\">  description:</label>";
      echo"  <div class=\"form-group\"><input class=\"form-control\" name = \"user_description\" type = \"text\" size = \"40\" value=".stripslashes($row['user_description'])."/></div> <br />";
       echo" <label for=\"name\">old_password:</label>";
       echo" <div class=\"form-group\"><input class=\"form-control\" name = \"old_password\" type = \"text\" size = \"40\"  /></div><br />";
       echo"<label for=\"name\"> new_password:</label>";
       echo"<div class=\"form-group\"><input class=\"form-control\" name = \"new_password\" type = \"text\" size = \"40\" /></div><br />";
       echo" <label for=\"name\">new_password_again:</label>";
       echo"  <div class=\"form-group\"><input class=\"form-control\" name = \"new_password2\" type = \"text\" size = \"40\" /></div> <br />";
       echo" <label for=\"name\"> message: </label>";
       echo" <div class=\"form-group\"><input class=\"form-control\" name = \"user_message\" type = \"text\" size=\"40\" value=".stripslashes($row['user_message'])."/></div> <br />";
       echo"  <input name = \"submit\" type = \"submit\" value = \"change\"  class=\"btn btn-lg\"/>";
       echo" </form>";
	   echo"</div>";		
	mysqli_free_result($result);
    mysqli_close($db);
?>

</body>
</html>
