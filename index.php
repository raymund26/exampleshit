<?php
  include "config.php";
  include "navbar.php";
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

  <div class="h"> <a href="admin_page.php">List of Students</a> </div> 
 <div class="h"><a href="books.php">List of Books</a></div>
  <div class="h"><a href="info_books.php">Book Request</a></div>
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
  <h3>User Side</h3>
  <br><br>
  <h3>Borrowed Books</h3>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="pwd">Student ID</label>
      <input type="text" class="form-control" id="book_id" placeholder="Enter Student ID" name="student_id">
    </div>
    <div class="form-group">
      <label for="pwd">Book Name</label>
      <input type="text" class="form-control" id="book_name" placeholder="Enter Book Name" name="book_name">
    </div>
    <div class="form-group mb-3">
                                <label for="">Issued Date</label>
                                <input type="date" name="issued_date" class="form-control" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Return Date</label>
                                <input type="date" name="return_date" class="form-control" />
    
    <button type="submit" name="submit" class="btn btn-default">submit</button>
  </form>
</div>
</div>

</body>

<?php
if(isset($_POST['submit'])){

    $student_id = ($_POST['student_id']);
    $book_name = ($_POST['book_name']);
    $issued_date = ($_POST['issued_date']);
    $return_date = ($_POST['return_date']);

    $select = " SELECT * FROM book_info WHERE student_id = '$student_id' && book_name = '$book_name' ";

    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = 'Book already exist!';
 
    }
    else{
          $insert = "INSERT INTO book_info(student_id, book_name, issued_date, return_date) VALUES('$student_id','$book_name','$issued_date','$return_date')";
          mysqli_query($conn, $insert);
       }
    
?>

<script type="text/javascript">
        alert("Updated successfully.");
        window.location="info_books.php"
      </script>
    <?php
  }
  ?>
</html>