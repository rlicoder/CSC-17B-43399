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
    <div>
        <p align="center">View and remove users<br><br>
    </div>
    <?php 
        
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }
        else{
            $page=1;
        }
        
        $pagesize=5;

        $conn= new mysqli("localhost","root","","timelogger");
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        $query=("select count(1) from entity_users");
        $result = $conn->query($query);
        $row=mysqli_fetch_row($result);
        $recordcount=$row[0]; 

        if($recordcount==0)
            $pagecount=0;
        else if($recordcount<$pagesize ||$recordcount==$pagesize){
                $pagecount=5;
            }
        else if($recordcount%$pagesize==0){
                $pagecount=$recordcount/$pagesize;
            }
        else 
                $pagecount=(int)($recordcount/$pagesize)+1;

    ?>

    <table id="view">
        <tr>
            <td>User ID</td>
            <td>User Name</td>
            <td>User Type</td>
        </tr>
    <?php 
    $sql=($page-1)*$pagesize;
    $result_=$conn->query("select * from entity_users limit {$sql},{$pagesize}");
    while($row=mysqli_fetch_row($result_))
    {   

        echo("<tr />");
        echo("<td>$row[0]</td>");
        echo("<td>$row[1]</td>");
        echo("<td>$row[3]</td>");
        echo("<tr />");
    }
    $conn->close();
    ?>
        <div>
            <p align="center">
            <?php
        if($page==1){
        echo("Home"." ");
    }
    else
        echo("<a href=viewpageremoveuser.php?page=1>Home </a>");

    if($page==1){
         echo("<-Previous"." ");
    }
    else 
        echo("<a href=viewpageremoveuser.php?page=".($page-1)."><-Previous </a>");

    if($page==$pagecount){
        echo("Next->"." ");
    }
    else 
        echo("<a href=viewpageremoveuser.php?page=".($page+1).">Next-> </a>");
    if($page==$pagecount){
        echo("Last");
    }
    else 
        echo("<a href=viewpageremoveuser.php?page=".$pagecount.">Last</a>");
    
    ?>
            </p>
    </div>
    </table>
    <div>
        <p align="center">
        <?php
        echo("Page: ".$page."/".$pagecount."<br />");
        ?>
        </p>
    </div>
    <form action="phpremoveuser.php" method="post">
        <h2 align="center">Remove a user</h2>
        <p align="center"> User ID:<input type="text" name="userId"  </p>
        <div align="center"> <input  type="submit" value="confirm" /> </div>
    </form>
</body>
</html>