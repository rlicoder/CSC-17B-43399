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

require_once('config.php');

//Declare variables
$server = 'localhost';//Server name
$username = 'root';//Server username
$password = '';//Server password
$db = 'timelogger';//Database name
$sql;//SQL query to be executed

//Create connection to database
$conn = connDB($server, $username, $password, $db);

echo "<label for='class'>Choose a class:</label>";

?>
