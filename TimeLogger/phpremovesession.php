<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "connectDatabase.php";

$userId=$_POST['userId'];


$sql_edit = "DELETE FROM timelogger.entity_sessions WHERE session_id={$userId};";


if ($conn->query($sql_edit) === TRUE) {
    echo "<script>window.alert('Update success');window.location.href='removesession.php'</script>";
}
else{
    echo "<script>alert('Update fail');window.location.href='removesession.php'</script>";
}       