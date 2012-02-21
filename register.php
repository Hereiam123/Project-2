<?php
	//connect to the database
	$connection=mysql_connect("localhost","ca081919","havener")
		or print "connect failed because ".mysql_error();  
		
    mysql_select_db("ca081919",$connection)
		or print "select failed because ".mysql_error();
		

	//get list of user ids in database
	$SQL = "SELECT * FROM id";
	$result = mysql_query($SQL);
	
	//check if current user id is real
	if($_POST['VoterID']>=1001 && $_POST['VoterID']<=1049){
		while ($row=mysql_fetch_array($result,MYSQL_ASSOC)){	
			$VoterID=$row['VoterId'];
			
			//if user id already exists go to...			
			if ($_POST['VoterID'] == $VoterID){
				header("Location: http://sulley.dm.ucf.edu/~ca081919/DIG4104c/project2/results.php");
				die;
			}
		}
		
		//if user id does not already exist add to database and go to...
		$SQL="INSERT INTO id (VoterId) VALUES ($_POST[VoterID])";
		$result=mysql_query($SQL,$connection);
		header("Location: http://sulley.dm.ucf.edu/~ca081919/DIG4104c/project2/candidate_one.html");
		die;
	}
	//if user id is not real ask to retype
	else {
		print"<!DOCTYPE html> 
				<html>
					<head>
						<title>ToonTown Voting System</title>
						<meta name='viewport' content='width=device-width, initial-scale=1'> 
						<link rel='stylesheet' href='http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css' />
						<link rel='stylesheet' href='mystyle.css' /> 
						<link rel='stylesheet' href='css/voting.css' />
						<script src='http://code.jquery.com/jquery-1.6.4.min.js'></script>
						<script src='http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js'></script>
					</head>";
					
		print"<div data-role='page' class='theme-preview'>
			<div data-role='header'>
				<h1>ToonTown Voting System</h1>
			</div><!-- /header -->
			<div data-role='content' class='ui-body ui-body-a ui-grid-b'>
			<div class='ui-block-a'></div>
				<div class='ui-block-b'>";
			
		print"Your VoterID was incorrect. Please try again.";
		
		print"<form method='post' action='register.php'>
				<p>Voter ID</p><input type='text' name='VoterID' />
				<input type='submit' value='Submit'>
			</form>";
			
		print"</div>
				<div class='ui-block-c'></div>
		<div data-role='footer'>
		</div>
		</div>";
}

	//disconnect
	mysql_close($connection);
?>