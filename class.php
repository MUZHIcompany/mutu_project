<?php
 class connectDB
 {
 	private $link;
 	private $result;

 	function __construct( $host, $DBname, $DBpass )
 	{
 		$this->link = mysql_connect( $host, $DBname, $DBpass );
 		if( !$this->link ) die( "coundn't connect: " . mysql_error() );
 	}

 	function selectDB( $DB )
 	{
 		mysql_select_db( $DB, $this->link );
 	}

 	function selectQuery( $sql )
 	{
 		$this->result = mysql_query( $sql, $this->link );
 		return $this->result;
 	}

 	function fetchRows()
 	{
 		if( $this->result ) $row = mysql_fetch_array($this->result);
 		return $row;
 	}

 	function fetchOneRow( $sql )
 	{
 		$data = mysql_query( $sql );
 		$row = mysql_fetch_array($data);
 		return $row;
 	}
 }
?>