<?php
	//connect to database
	$connection=mysql_connect("localhost","ca081919","havener")
		or print "connect failed because ".mysql_error();  
		
    mysql_select_db("ca081919",$connection)
		or print "select failed because ".mysql_error();
		
	//if clicked increment candidates votes by 1	
	if($_POST['action']=='Can 1'){
		$query="UPDATE voting SET can1=can1+'1' WHERE Votes='1'";
		$result=mysql_query($query,$connection);
		header("Location: http://sulley.dm.ucf.edu/~ca081919/DIG4104c/project2/results.php");
	}
	else if($_POST['action']=='Can 2'){
		$query="UPDATE voting SET can2=can2+'1'";
		$result=mysql_query($query,$connection);
		header("Location: http://sulley.dm.ucf.edu/~ca081919/DIG4104c/project2/results.php");	
	}
	else if($_POST['action']=='Can 3'){
		$query="UPDATE voting SET can3=can3+'1'";
		$result=mysql_query($query,$connection);
		header("Location: http://sulley.dm.ucf.edu/~ca081919/DIG4104c/project2/results.php");
	}
	
	//disconnect
	mysql_close($connection);
?>