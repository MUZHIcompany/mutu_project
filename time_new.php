<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>

<body>
<?php
  session_start();
  include_once("head.html");
  include_once( "Menu.php" ); 

?>
<div class="container" charset=utf-8>
    <legend>
    time
    </legend>
    <ul>
<?php
  
  include_once( "class.php" );
      include_once( "config.php" );
    $db=new connectDB($host,$guest,$guestPassword);
    $query="select time from act_time_table where act_id="-$_SESSION["act_now"];
    $db.selectQuery($query);
    while ($row=db.fetchOneRow())
    {
	echo "<li>";
	echo $row;
        echo "</li>";	
    }
    ?>
    </ul>
    <form action="new_activity_time.php" class="form-horizontal"  role="form">
    
	    <fieldset>
            <legend>添加活动可能进行的时间：</legend>
            <div class="form-group">
                <label for="dtp_input1" class="col-md-2 control-label">DateTime Picking</label>
		<div class="input-group date form_datetime col-md-5" data-date=<?php echo date("'Y-m-d h:i:s'")?> data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" name='time' readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
			<input type="submit" class="btn btn-default" value="OK!">
		    </div>
				<input type="hidden" id="dtp_input1" value="" /><br/>
            </div>
        </fieldset>
    </form>
</div>

<script type="text/javascript" src="jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
</script>

</body>
</html>
