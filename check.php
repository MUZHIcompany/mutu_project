
if( !$_SESSION['uesrID'] ) 
 {
  echo "<script>alert('请先登陆!')</script>";
  $url = "login.php";
  echo "come in {$url}<br />";
  echo "<script LANGUAGE='Javascript'>"; 
  echo "location.href='{$url}'"; 
  echo "</script>"; 
 }

