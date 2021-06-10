<!DOCTYPE html>
<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isSet($_SESSION["username"])) {//If not logged in
    header("location:index.php");
}
require_once('login.php');
?>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>View all of your Times</title>
</head>

<body>
    <!--Header-->
    <header>
        <img src="header.png" alt="header" />
    </header>
    <div id="main">
        <h1>Your Times</h1>
        <a href="home.php" style="float: left; text-decoration: none; display: block; position: absolute; width: 10vw; height: 7vh; line-height: 7vh; background: linear-gradient(#cbf6ff, #00d5ff); color: black; margin-left: 2vw; border-radius: 10px;">Home</a>
	
	<form action="" method="post" target="_self">
	    <label for="sortName">Choose an option:</label>
	    <select name="sort" id="sort">
	      <option value="c">Cumulative</option>
	      <option value="i">Individual</option>
	    </select>  
	    <input type="submit" value="View">
	</form>
    </div>
</body>
</html>
