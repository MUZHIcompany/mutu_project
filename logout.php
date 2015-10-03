<?php
 session_start();
 $_SESSION['userID'] = "";
 echo "<script LANGUAGE='Javascript'>"; 
 echo "location.href='front.php'";  
 echo "</script>";	
?>