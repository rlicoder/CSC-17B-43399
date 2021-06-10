<?php
    include'connectDatabase.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $user = $_POST["user"];
    $pw = $_POST["psw"];
    
    $checkbox_select=$_POST["category"];
    $expire=time()+60*60*24*30;
    if($checkbox_select==3){
        setcookie("user_cookie", $user, $expire);
        $ck = $_COOKIE["user_cookie"];
    }
    else{
        setcookie("user_cookie", " ", $expire);
    }
    
    if($user=='admin' && $pw=='admin'){
       echo "<script> alert('Welcome to administration');window.location.href='admin.html'; </script>";
    }
    $query = "SELECT * FROM entity_user WHERE user_name='$user' and pass='$pw'";
    $result = $conn->query($query);
    
    if($result->num_rows > 0){
        echo $result->num_rows;
        echo "<script> alert('Login successful'); window.location.href='game.html'; </script>";
    }
    else{
        echo "<script> alert('Wrong username/password');window.location.href='index.php'; </script>";
    }
?>