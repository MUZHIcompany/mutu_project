<HTML>
<BODY>
<?php
 session_start();
  include_once("head.html");
  include_once( "Menu.php" ); 
  include_once( "config.php" );
  include_once( "class.php" );
  $db=new connectDB($host,$DBname,$DBpass);
  $query="insert into act_time_table values('','"$_SESSION['act_now']"','"$_POST['time']"',0)";
  $db.selectQuery($query);
   $url="/time_new.php";
  echo "<script language='javascript' type='text/javascript'>";
  echo "window.location.href='$url'";
  echo "</script>";
?>

</BODY>
