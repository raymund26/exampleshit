<?php
  include "config.php";
  include "navbar.php";
  $id=$_GET["id"];

$book_name="";
$book_id="";
$edition="";
$department="";
$quantity="";

$res= mysqli_query($conn, "select * from books where id=$id");
while($row=mysqli_fetch_array($res))
{

    $book_name = $row["book_name"];
    $book_id = $row["book_id"];
    $edition = $row["edition"];
    $department = $row["department"];
    $quantity = $row["quantity"];

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
  <h3>Book Info</h3>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="pwd">Book ID</label>
      <input type="text" class="form-control" id="book_id" placeholder="Enter Book ID" name="book_id" required value="<?php echo $book_id ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Book Name</label>
      <input type="text" class="form-control" id="book_name" placeholder="Enter Book Name" name="book_name" required value="<?php echo $book_name ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Edition</label>
      <input type="text" class="form-control" id="edition" placeholder="Enter Edition" name="edition" required value="<?php echo $edition ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Department</label>
      <input type="text" class="form-control" id="department" placeholder="Enter Department" name="department" required value="<?php echo $department ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Quantity</label>
      <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity" required  value="<?php echo $quantity ?>">
    </div>
    
    <button type="submit" name="update" class="btn btn-default">Update</button>
  </form>
</div>
</div>

</body>

<?php
if(isset($_POST["update"]))
{

    mysqli_query($conn, "UPDATE books set book_id='$_POST[book_id]', book_name='$_POST[book_name]', edition='$_POST[edition]', department='$_POST[department]', quantity='$_POST[quantity]' where id=$id");

    ?>
<script type="text/javascript">
   alert("Updated successfully.");
window.location="books.php";

</script>
    <?php
}

?>
</html>