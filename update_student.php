<?php
  include "config.php";
  include "navbar.php";
  $id=$_GET["id"];

$student_id="";
$name="";
$email="";
$address="";
$number="";

$res= mysqli_query($conn, "select * from user_form where id=$id");
while($row=mysqli_fetch_array($res))
{

    $student_id = $row["student_id"];
    $name = $row["name"];
    $email = $row["email"];
    $address = $row["address"];
    $number = $row["number"];

}

?>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style3.css">

  <style type="text/css">
		.srch
		{
			padding-left: 1000px;

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

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

	</style>

</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <div style="color: white; margin-left: 60px; font-size: 20px;">

               <img class='img-circle profile_img' height=120 width=120 src='iconsys.jpg'pic>
                  </br></br>

                
            </div><br>
  			

 <div class="h"> <a href="books.php">List of Students</a> </div> 
 <div class="h"><a href="books.php">List of Books</a></div>
  <div class="h"><a href="info_books.php">Info on Books</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
  
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

<div class="form-container">
  <div class="col-lg-4">
  <h3>Student Info</h3>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="pwd">Student_ID</label>
      <input type="text" class="form-control" id="student_id" placeholder="Enter Student ID" name="student_id" required value="<?php echo $student_id ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required value="<?php echo $name ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Email</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required value="<?php echo $email ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Address</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" required value="<?php echo $address ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Contact No.</label>
      <input type="text" class="form-control" id="number" placeholder="Enter Number" name="number" required  value="<?php echo $number ?>">
    </div>
    
    <button type="submit" name="update" class="btn btn-default">Update</button>
  </form>
</div>
</div>

</body>

<?php
if(isset($_POST["update"]))
{

    mysqli_query($conn, "UPDATE user_form set student_id='$_POST[student_id]', name='$_POST[name]', email='$_POST[email]', address='$_POST[address]', number='$_POST[number]' where id=$id");

    ?>
<script type="text/javascript">
   alert("Updated successfully.");
window.location="admin_page.php";

</script>
    <?php
}

?>
</html>