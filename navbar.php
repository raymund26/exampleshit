<!DOCTYPE html>
<html>
<head>
	<title>
	</title>

	  <link rel="stylesheet" type="text/css" href="style3.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="bootstrap.min.css">
   
</head>
<body>

	    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
          </div>
          
          <?php
            if(isset($_SESSION['login_user']))
            {?>
                <ul class="nav navbar-nav">
                  

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="profile.php">
                    <div style="color: white">

                      <?php
                        echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";

                        echo " ".$_SESSION['login_user']; 
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT </a></li>
                  
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">

                <li><a href="login_form.php"> LOGOUT</span></a></li>
        
              </ul>
                <?php
            }

          ?>

      </div>
    </nav>



</body>
</html>