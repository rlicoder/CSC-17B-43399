<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "connectDatabase.php";

$userId=$_POST['userId'];
$pass=$_POST['password'];
$utype = $_POST['usertype'];

$sql_edit = "INSERT INTO timelogger.entity_users (user_username, user_password, user_type) VALUES ('$userId', '$pass', '$utype');";


if ($conn->query($sql_edit) === TRUE) {
    echo "<script>window.alert('Update success');window.location.href='addsession.php'</script>";
}
else{
    echo "alert('Update fail');window.location.href='addsession.php'</script>";
}       