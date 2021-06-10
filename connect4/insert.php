<?php
include'connectDatabase.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $user = $_POST["user"];
    $pw = $_POST["psw"];
    $email = $_POST["email_address"];
    $re_username = '/^[a-zA-Z0-9_-]{3,15}$/m';
    $re_password = '/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})/m';
    $re_email = '/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/m';
    
    $query = "SELECT * FROM entity_user WHERE user_name='$user'";
    $result = $conn->query($query);
    if($result->num_rows > 0){
        echo "<script> alert('Username already exits'); window.location.href='regist.html'; </script>";
    }
    else{
        if(preg_match_all($re_username, $user, $matches, PREG_SET_ORDER, 0)){
            if(preg_match_all($re_password, $pw, $matches, PREG_SET_ORDER, 0)){
                if(preg_match_all($re_email, $email, $matches, PREG_SET_ORDER, 0)){
                    $sql = "INSERT INTO entity_user (user_name, pass, email)
                            VALUES ('$user','$pw','$email')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<script> alert('Regist successful'); window.location.href='index.php'; </script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                else{
                    echo "<script> alert('Please enter a vaild email address'); window.location.href='regist.html'; </script>";
                }
            }
            else{
                echo "<script> alert('Please enter a 6-20 length password must cotains one lowercase character, one uppercase character, and numbers'); window.location.href='regist.html'; </script>";
            }
        }
        else{
            echo "<script> alert('Please enter a 3-15 length username only cotains letters, numbers, and _-'); window.location.href='regist.html'; </script>";
        }
    }
    $conn->close();
?>