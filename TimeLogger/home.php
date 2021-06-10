<!DOCTYPE html>
<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isSet($_SESSION["username"])) {//If not logged in
    header("location:index.php");
}
?>
<html lang="en-US">
    <head>
        <meta charset="utf-8" />
        <link href="site.css" rel="stylesheet" type="text/css">
        <script src="login.js"></script>
        <title>Time Logger</title>
    </head>
    <body>
        <!--Header-->
        <header>
            <img src="header.png" alt="header" />
        </header>
        <div id="main">
	    <div class="opt"><a href="startsession.php" class="optLink">Start a new Session</a></div>
            <div class="opt"><a href="surveyviewer.php" class="optLink">View Your Previous Sessions</a></div>
        </div>
    </body>
</html>