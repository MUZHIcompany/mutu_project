<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>沐涂</title>
<?php include_once("head.html") ?>
</head>
<body>
<?php
if( $_SESSION['userID'] != "" )
echo "id: " . $_SESSION['userID'];
include_once("menu.php")
?>

</body>
</html>