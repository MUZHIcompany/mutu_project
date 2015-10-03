<div class="header">
	<div class="container">
		<div class="header-bottom">
		<div class="top-nav">
			<span class="menu"><img src="images/menu.png" alt=""> </span>
				<ul>
					<li ><a href="front.php" class="color"><i class="glyphicon glyphicon-home"></i>  </a> </li>
					<!-- back to home page -->
					<li>
					<a href="portfolio.html"   class="hvr-bounce-to-top">
					<img src="tab栏icon/icon广场.png" alt="" witdh="50" height="50" >
					<br />广场</a>
					</li>
					<li >
					<a href="404.html" class="hvr-bounce-to-top">
					<img src="tab栏icon/icon活动.png" alt="" witdh="50" height="50" >
					<br />活动 </a> 
					</li>
					<li>
					<a href="blog.html"  class="hvr-bounce-to-top">
					<img src="tab栏icon/icon消息.png" alt="" witdh="50" height="50" >
					<br />消息 </a>
					</li>
					<li>
					<?php
					if( $_SESSION['userID'] == "" )
						echo "<a href='login.php'  class='hvr-bounce-to-top'>";
					else
					{
						echo $_SESSION['userID'];
						echo "<a href='mydata.php'  class='hvr-bounce-to-top'>";
					}
					?>
					<img src="tab栏icon/icon我的.png" alt="" witdh="50" height="50" >
					<br />我的 </a>
					</li>
					<li>
					<br />
					<form name="input" action="search.php" method="get" >
					<input type="image" src="images/search.png" />
					<input type="text" name="searchContents" />
					</form>
					</li>
					<div class="clearfix"> </div>
				    </ul>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>