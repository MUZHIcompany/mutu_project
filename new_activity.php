<HTML>
<BODY>
<?php
  session_start();
  include_once("head.html");
  include_once( "Menu.php" ); 
  include_once( "config.php" );
  include_once( "class.php" );
  
  $servername="localhost";
  $username="root";
  $password="";
  $dbname="mutu";
  $cursor=mysqli_connect($servername,$username,$password,$dbname);
  if (!$cursor)
  {
    $cursor=mysqli_connect($servername,$username,$password,$dbname);
    echo "connection!";
  }
  $query="insert into activity values('','".$_POST["act_name"]."','"-$_SESSION[""]-"','".$_POST["act_intro"]."','"."remark"."',".$_POST["act_num"].",0,'','')";
  if (!mysqli_query($cursor,$query))
  {
   echo mysqli_error($cursor);
   echo $query;
  }
  else
  {
      $query="select activity_id from activity where activity_name="-$_POST["act_name"]-"and activity_organizer="-$_SESSION[""];
      mysqli_query($cursor,$query);
      $_SESSION['act_now']=$cursor;
      echo "创建活动完毕，转入时间添加界面..."    
  mysqli_close($cursor);
  $url="/time_new.php";
  echo "<script language='javascript' type='text/javascript'>";
  echo "window.location.href='$url'";
  echo "</script>";
    }
?>
</BODY>
</HTML>
