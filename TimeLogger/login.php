<?php
function phpAlert($msg)
{
    echo '<script type="text/javascript"> alert("' . $msg . '")</script>';
}

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
//Include files
require_once('config.php');

//Declare variables
$server = 'localhost';//Server name
$username = 'root';//Server username
$password = '';//Server password
$db = 'timelogger';//Database name
$sql;//SQL query to be executed

//Create connection to database
$conn = connDB($server, $username, $password, $db);

//Check if form data sent through post
if($_SERVER["REQUEST_METHOD"] == "POST") {//Process input from user
    //If login else if sign up
    if(isSet($_POST["loginUsername"])) {
        //Search database for username provided
        $uname = $_POST["loginUsername"];
        $sql = "SELECT `user_id`, `user_username`, `user_password`, `user_type` FROM `timelogger`.`entity_users` WHERE `user_username`='$uname'";
        $result = $conn->query($sql);

        //If login was found
        if($result->num_rows > 0) {
            $loginInfo = $result->fetch_assoc();
            if($_POST["loginPassword"] == $loginInfo["user_password"]){
                $_SESSION["username"] = $uname;
                $_SESSION["password"] = $pword;
                $_SESSION["id"] = $loginInfo["user_id"];
                $_SESSION["type"] = $loginInfo["user_type"];
		$_SESSION["datestart"] = new DateTime();
		
		$user = $_POST["loginUsername"];

		$expire=time()+60*60*24*30;
		if($user != ""){
		    setcookie("user_cookie", $uname, $expire);
		    $ck = $_COOKIE["user_cookie"];
		}
		else{
		    setcookie("user_cookie", "", $expire);
		}
		if ($loginInfo["user_type"] == "admin")
		{
		    header("location:admin.html");
		}
                else
		{
		    header("location:home.php");
		}
            } else {//Invalid password
                echo "<script>" .
                    "window.onload = function () {" .
                        "setMsg(1, 'Invalid password');" . 
                        "document.getElementById('loginForm').style.display = 'block';" .
                        "document.getElementById('loginUsername').value = '$uname';" .
                    "}" .
                "</script>";
            }
        } else {//Login not found
            echo "<script>" . 
                    "window.onload = function () {" .
                        "setMsg(0, 'Username does not exist');" . 
                        "document.getElementById('loginForm').style.display = 'block';" .
                    "}" .
                "</script>";
        }
    } else if(isset($_POST["signUpUsername"])) {
        //Get new username and password from post
        $uname = $_POST["signUpUsername"];
        $pword = $_POST["signUpPassword"];

        //Check if username already exists
        $sql = "SELECT `user_id`, `user_username`, `user_password` FROM `timelogger`.`entity_users` WHERE `user_username`='$uname'";
        $result = $conn->query($sql);
        
        //If username is found
        if($result->num_rows > 0) {
            //Echo script that lets user know name is unavailable
            echo "<script>" . 
                    "window.onload = function () {" .
                        "setMsg(2, 'Username already exists');" . 
                        "document.getElementById('signUpForm').style.display = 'block';" .
                    "}" .
                "</script>";
        } else {
            $sql = "INSERT INTO `timelogger`.`entity_users` (`user_username`, `user_password`) VALUES ('$uname', '$pword');";
            $conn->query($sql);
            $_SESSION["username"] = $uname;
            $_SESSION["password"] = $pword;
            $_SESSION["id"] = $conn->insert_id;
            $_SESSION["type"] = "user";
            header("location:home.php");
        }
    }
    else if (isset($_POST["class"]))
    {
	$subject = $_POST["class"];
	$start = $_POST["starttime"];
	$end = $_POST["endtime"];
	$s_id = $_SESSION["id"];
	$sql = "INSERT INTO `timelogger`.`entity_sessions` (`session_user_id`, `session_start_time`, `session_end_time`, `session_subject`) VALUES ('$s_id', '$start', '$end', '$subject');";
	$conn->query($sql);

    }
    else if (isset($_POST["sort"]))
    {
	
	if ($_POST["sort"] == 'c')
	{
	    $s_id = $_SESSION["id"];
	    echo "<table style='width:60%' id='tabletimes'>";
	    echo "<tr>";
	    echo "<th>Subject</th>";
	    echo "<th>Total Time </th>";
	    echo "</tr>";
	    $sql = "SELECT subject FROM timelogger.entity_subject;";
	    $res = mysqli_query($conn, $sql);
	    while ($subject_name = mysqli_fetch_assoc($res))
	    {
		$total_hour = 0;
		$total_min = 0;
		$sname = $subject_name["subject"];
		$sql1 = "SELECT session_start_time, session_end_time FROM timelogger.entity_sessions WHERE session_user_id='$s_id' AND session_subject='$sname';";
		$res1 = mysqli_query($conn, $sql1);
		echo "<tr><td>" . $sname . "</td>";
		
		while ($time = mysqli_fetch_assoc($res1))
		{
		    $str = $time["session_end_time"];
		    $date_end = new DateTime($str);
		    
		    $str1 = $time["session_start_time"];
		    $date_start = new DateTime($str1);
			    
		    $dif = $date_end->diff($date_start);
		    $total_hour += $dif->h;
		    $total_min += $dif->i;
		}
		echo "<td>";
		echo $total_hour . "h" . $total_min . "m";
		echo "</td></tr>";
		
	    }
	    
	    $sql = "SELECT session_start_time FROM timelogger.entity_sessions WHERE session_user_id='$s_id';";
	    $res = mysqli_query($conn, $sql);
	    while ($test = mysqli_fetch_assoc($res))
	    {
		console_log($test);
	    }
	}
	else
	{
	    echo "<table style='width:60%' id='tabletimes'>";
	    echo "<tr>";
	    echo "<th>Subject</th>";
	    echo "<th>Start Time</th>";
	    echo "<th>End Time</th>";
	    echo "</tr>";
	    $sql = "SELECT session_subject, session_start_time, session_end_time FROM timelogger.entity_sessions WHERE session_user_id='4';";
	    $result = mysqli_query($conn, $sql);
	    while ($row = mysqli_fetch_assoc($result))
	    {
		echo "<tr>";
		foreach ($row as $field => $value)
		{
		    echo "<td>" . $value . "</td>";
		}
		echo "</tr>";
	    }
	}
	echo "</table";
    }
    //Close database connection
    $conn->close();
}
?>