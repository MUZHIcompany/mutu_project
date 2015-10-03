<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>搜索结果</title>
<?php include_once("head.html") ?>
</head>
<body>

<?php
include_once( "class.php" );
include_once( "config.php" ); //store the database information
$db = new connectDB( $host, $administrator, $administratorPassword );	
if( !$db ) die("Cannot connect to database");		
$db->selectDB($BMS);
//$query = "select from" . $TableName . "where" . $ItemName . "REGEXP" . $_GET['searchContents'];

if( isset($_GET['page']) )
{
	$page = intval($_GET['page']);
}
else
{
	$_SESSION['searchContents'] = $_GET['searchContents'];
	$page = 1;
}//check the page

$sql= "select count(*) as amount from book";
$db->selectQuery( $sql );
echo "<div name='searchResult'>";
$row = $db->fetchRows();
$amount = $row['amount'];
$pageSize = 10;
if( !$amount )
	$pageCount = 0;
else
{
	if( $amount < $pageSize ) $pageCount = 1;
	else if( $amount % $pageSize ) $pageCount = (int)($amount / $pageSize) + 1;
	else $pageCount = $amount / $pageSize;
}
//check the total page number

if( !$amount )
	echo "抱歉，没有查找到相关信息";
else
{
	echo "Page: " . $page;
	echo "Search contents: " . $_SESSION['searchContents']; 
	//echo ($page-1)*$pageSize;
	$sql = "select * from book limit" . ($page-1)*$pageSize . $pageSize;
	$db->selectQuery( $sql );
	while( 	$row = $db->fetchRows() )
	{
		echo "<table border='1'>";
		echo "<tr>
	      	<td rowspan='3'>
	      	图片
	      	</td>
            <td>
            第一行
            </td>
	      </tr>
	      <tr>
	      	<td>
	      	第二行
	      	</td>
	      </tr>
	      <tr>
	      	<td>
	      	第三行
	      	</td>
	      </tr>
	      <tr>
	      	<td>
	      	第四行1
	      	</td>
	      	<td>
	      	第四行2
	      	</td>
	      </tr>";
		echo "</table>";
	}
}
$base = (int)($page/$pageSize);
$totalPage = (int)($amount/$pageSize+1);
if( $page > 10 )
{
	echo "<form action='search.php' method='get'>";
	echo "<input type='submit' name='page' value='" . $page-10 . "'> </form>";
}
for( $i = 1; $i <= 10 && $i+$base<=$totalPage; $i++ )
{
	echo "<form action='search.php' method='get'>";
	echo "<input type='submit' name='page' value='" . ($i+$base*10) . "'> </form>";
}
if( ($base+1)*10 < $totalPage )
{
	echo "<form action='search.php' method='get'>";
	echo "<input type='submit' name='page' value='" . ($base+1)*10+1 . "'> </form>";
}


echo "</div>";
/*
	echo "<table border='1'>";
	echo "<tr>
	      	<td rowspan='4'>
	      	图片
	      	</td>
            <td>
            第一行
            </td>
	      </tr>
	      <tr>
	      	<td>
	      	第二行
	      	</td>
	      </tr>
	      <tr>
	      	<td>
	      	第三行
	      	</td>
	      </tr>
	      <tr>
	      	<td>
	      	第四行
	      	</td>
	      </tr>";
	echo "</table>"; */
include_once("menu.php");
?>
</body>
</html>