<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('login.php');
?>
<html lang="en">
<head>
<meta charset="utf-8">
	<title></title>
        <link href="site.css" rel="stylesheet" type="text/css" />
        <link href="login.css" rel="stylesheet" type="text/css" />
	<script src="sessionmanager.js"></script>
</head>
<body>
<h> Start a New Session <br> </h>
    <form action="" method="post" target="_self">
	<label for="class">Choose a class:</label>
	<select name="class" id="class">
	<?php
	$server = 'localhost';//Server name
	$username = 'root';//Server username
	$password = '';//Server password
	$db = 'timelogger';//Database name
	$sql;//SQL query to be executed

	//Create connection to database
	$conn = connDB($server, $username, $password, $db);
	$sql = "SELECT * FROM timelogger.entity_subject;";
	$res = mysqli_query($conn, $sql);
	
	while ($subject_name = mysqli_fetch_assoc($res))
	{
	    echo "<option value='" . $subject_name["subject"] . "'>" . $subject_name["subject"] . "</option>";
	}
	?>
	</select>  
	<input type="button" onclick="startSession();" value="Start Session">
	<input type="button" onclick="endSession();" value="End Session">
	<input type="submit" value="Submit Session">
	<a id="startclock"><br>Start Time: </a>
	<textarea readonly id="starttime" name="starttime" style="width:200px;height:20px;"></textarea>
	<a id="endclock"><br>End Time: </a>
	<textarea readonly id="endtime" name="endtime" style="width:200px;height:20px"></textarea>
    </form>
</body>
</html>