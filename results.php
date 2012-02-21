<?php
	//connect to database
	$connection=mysql_connect("localhost","ca081919","havener")
		or print "connect failed because ".mysql_error();  
			
	mysql_select_db("ca081919",$connection)
		or print "select failed because ".mysql_error();
			
	//get get candidate votes from database		
	$SQL = "SELECT * FROM voting";
	$result = mysql_query($SQL);

	print"<!DOCTYPE html> 
		<html>
			<head>
				<title>ToonTown Voting System</title>
				<meta name='viewport' content='width=device-width, initial-scale=1'> 
				<link rel='stylesheet' href='http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css' />
				<link rel='stylesheet' href='css/mystyle.css' /> 
				<link rel='stylesheet' href='css/voting.css' />
				<script src='http://code.jquery.com/jquery-1.6.4.min.js'></script>
				<script src='http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js'></script>
			</head>";
			
	print"<div data-role='page' class='theme-preview'>
		<div data-role='header'>
			<h1>ToonTown Voting System</h1>
		</div><!-- /header -->
		<div data-role='content' class='ui-body ui-body-a ui-grid-b'>";
		
	//print votes to screen	
	while ($row=mysql_fetch_array($result,MYSQL_ASSOC)){	
		$can1 =$row['can1'];
		$can2 =$row['can2'];
		$can3 =$row['can3'];
		
		print"<div class='ui-block-a' id='results1'>";
		print"<img src='img/popeye.jpg' alt='' />";
		print "<h3>Votes: $can1</h3></div>";
		print"<div class='ui-block-b' id='results2'>";
		print"<img src='img/betty.jpg' alt='' />";
		print "<h3>Votes: $can2</h3></div>";
		print"<div class='ui-block-c' id='results3'>";
		print"<img src='img/mickey.jpg' alt='' />";
		print "<h3>Votes: $can3</h3></div>";
	}

	print"</div>
		<div data-role='footer'>
		</div>
		</div>";
		
	//disconnect	
	mysql_close($connection);
?>