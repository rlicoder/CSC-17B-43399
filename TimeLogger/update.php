<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "connectDatabase.php";

$userId=$_POST['userId'];
$password=$_POST['password'];

$sql_edit = "UPDATE entity_users SET user_password='$password' WHERE user_username='$userId'";


if ($conn->query($sql_edit) === TRUE) {
    echo "<script>window.alert('Update success');window.location.href='edit.php'</script>";
}
else{
    echo "alert('Update fail');window.location.href='edit.php'</script>";
}       