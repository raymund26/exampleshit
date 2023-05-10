<?php
  include "config.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/style.css">
   <style type="text/css">
   
.srch {
   padding-right: 10px;
   float: right;
}
		
body {
   font-family: "Lato", sans-serif;
   transition: background-color .5s;
   background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(bg3.webp);
	background-position: center;
	background-size: cover;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px; 
}

.img-circle{
	margin-left: 20px;
}

.h:hover{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

	</style>

</head>
<body>
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <div style="color: white; margin-left: 60px; font-size: 20px;">

               <img class='img-circle profile_img' height=120 width=120 src='iconsys.jpg'pic>
                  </br></br>

                
            </div><br>
  			

 <div class="h"> <a href="admin_page.php">List of Students</a> </div> 
 <div class="h"><a href="add.php">Add Book</a></div>
  <div class="h"><a href="info_books.php">Info on Books</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
	<!--___________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search student.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>

	<h2>List Of Students</h2>
   <br><br>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($conn,"SELECT * from user_form where name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: rgba(203,205,255,0.7)'>";
				//Table header
				echo "<th>"; echo "Name";  echo "</th>";
				echo "<th>"; echo "Student ID";  echo "</th>";
				echo "<th>"; echo "Address";  echo "</th>";
            echo "<th>"; echo "Number";  echo "</th>";
            echo "<th>"; echo "Edit";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr style='background-color: rgba(255,255,255,0.5);'>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['student_id']; echo "</td>";
				echo "<td>"; echo $row['address']; echo "</td>";
            echo "<td>"; echo $row['number']; echo "</td>";
            echo "<td>"; ?> <a href="update.php? id=<?php echo $row["id"]; ?>">
					<button type="button" class="btn btn-success"> Update </button></a> <?php
				?> <a href="delete.php? id=<?php echo $row["id"]; ?>">
				<button type="button" class="btn btn-danger"> Delete </button></a> <?php echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($conn,"SELECT * FROM `user_form` ORDER BY `name` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: rgba(203,205,255,0.7);'>";
				//Table header
				echo "<th>"; echo "Name";  echo "</th>";
				echo "<th>"; echo "Student ID";  echo "</th>";
				echo "<th>"; echo "Address";  echo "</th>";
            echo "<th>"; echo "Number";  echo "</th>";
            echo "<th>"; echo "Edit";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr style='background-color: rgba(255,255,255,0.5);'>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['student_id']; echo "</td>";
				echo "<td>"; echo $row['address']; echo "</td>";
				echo "<td>"; echo $row['number']; echo "</td>";
				echo "<td>"; ?> <a href="update.php? id=<?php echo $row["id"]; ?>">
					<button type="button" class="btn btn-success"> Update </button></a> <?php
				?> <a href="delete.php? id=<?php echo $row["id"]; ?>">
				<button type="button" class="btn btn-danger"> Delete </button></a> <?php echo "</td>";

				echo "</tr>";
			}
		}
		echo "</table>";
		
		
   ?>
</div>
</body>
</html>