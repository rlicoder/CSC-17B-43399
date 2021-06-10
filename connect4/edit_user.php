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
                                    <li><a href="viewpage.php" class="active"><span>View</span></a></li>
                                    <li><a href="edit.php" class="active"><span>Edit</span></a></li>
				</ul>
			</div>
		</div>
	</div>
        <table id="view">
        <tr>
            <td>Username</td>
            <td>Password</td>
            <td>Email</td>
        </tr>
        <?php
        include'connectDatabase.php';

        $user_info = $_POST["edit_info"];
        $email_info = $_POST["edit_info"];

        $query = "SELECT * FROM entity_user WHERE user_name='$user_info'";
        $result = $conn->query($query);

        $query_email = "SELECT * FROM entity_user WHERE email='$email_info'";
        $result_email = $conn->query($query_email);
        if($result->num_rows > 0){
            while($row=mysqli_fetch_row($result)){   
                echo("<tr />");
                echo("<td>$row[0]</td>");
                echo("<td>$row[1]</td>");
                echo("<td>$row[2]</td>");
                echo("<tr />");
            }
        }
        else if($result_email->num_rows > 0){
            while($row=mysqli_fetch_row($result_email)){   
                echo("<tr />");
                echo("<td>$row[0]</td>");
                echo("<td>$row[1]</td>");
                echo("<td>$row[2]</td>");
                echo("<tr />");
            }
        }
        else{
            echo "<script>window.alert('Username/email does not exits');window.location.href='edit.php'</script>";
        }
        ?>
        </table>
    <form action="update.php" method="post">
        <h2 align="center">User edit</h2>
        <p align="center"> Username:<input type="text" name="userId"  </p>
        <p align="center"> Password:<input type="text" name="password" </p>
        <p align="center"> Email:<input type="text" name="email"  </p>
        <div align="center"> <input  type="submit" value="confirm" /> </div>
    </form>
    
</body>
</html>