<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style2.css" type="text/css" media="all" />
</head>
<body>
	<div id="header">
		<div class="shell">
			
			<div id="head">
				<h1><a href="admin.html">Administration</a></h1>
				<div class="right">
					<p>
						Welcome Administrator |
                                                <a href="index.php"><strong> Logout</strong></a>
					</p>
				</div>
			</div>
			<div id="navigation">
				<ul>
				    <li><a href="admin.html" class="active"><span>Home</span></a></li>
                                    <li><a href="viewpage.php" class="active"><span>View Users</span></a></li>
				    <li><a href="viewsessions.php" class="active"><span>View Sessions</span></a></li>
                                    <li><a href="edit.php" class="active"><span>Edit</span></a></li>
				    <li><a href="addsession.php" class="active"><span>Add or Session</span></a></li>
				    <li><a href="removesession.php" class="active"><span>Remove a Session</span></a></li>
				    <li><a href="adduser.php" class="active"><span>Add a User</span></a></li>
				    <li><a href="removeuser.php" class="active"><span>Remove a User</span></a></li>

				</ul>
			</div>
		</div>
	</div>

    <form action="phpadduser.php" method="post">
        <h2 align="center">Add a user</h2>
        <p align="center"> Username:<input type="text" name="userId"  </p>
        <p align="center"> Password: <input type="text" name="password" </p>
	<p align="center"> User Type (admin or user):<input type="text" name="usertype" </p>
		
        <div align="center"> <input  type="submit" value="confirm" /> </div>
    </form>
    
</body>
</html>