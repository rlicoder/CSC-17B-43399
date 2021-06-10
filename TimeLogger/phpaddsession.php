<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "connectDatabase.php";

$userId=$_POST['userId'];
$sstart=$_POST['sstart'];
$send = $_POST['send'];
$ssubject = $_POST['ssubject'];

$sql_edit = "INSERT INTO timelogger.entity_sessions (session_user_id, session_start_time, session_end_time, session_subject) VALUES ('$userId', '$sstart', '$send', '$ssubject');";


if ($conn->query($sql_edit) === TRUE) {
    echo "<script>window.alert('Update success');window.location.href='addsession.php'</script>";
}
else{
    echo "alert('Update fail');window.location.href='addsession.php'</script>";
}       