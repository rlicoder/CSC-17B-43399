<?php
    setcookie("user_cookie", "username", time()+600);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Connect 4</title>
 <script src="login.js"></script>
 <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
 <link href="style.css" rel="stylesheet">
 
</head>
<body>
    <form action="login.php" method="post">
<div class="box">
    
    <div id="header">
            <h2 align="center">Connect 4 Login</h2>
    </div>
    <div class="input_box">
        <input id="name" type="text" name="user" placeholder="Username" value="<?php echo $_COOKIE['user_cookie'] ?>">
    </div>
    <div class="input_box">
        <input id="pass" type="password" name="psw" placeholder="Password">
    </div>
        <input type="checkbox" name ="category" value="3" checked="checked"> Remember me
    <div class="input_box">
        <input type="submit" value="Login">
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="regist.html"><input type="button" class="btn btn-info" name="regist" value="Sign up"></a>
    </div>
</div>
    </form>
</body>
</html>