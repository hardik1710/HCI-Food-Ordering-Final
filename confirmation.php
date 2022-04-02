<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>

<body class ="home" style="background-image: url('images/img/confirmation.jpg');  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">

        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                                      <a class="navbar-brand" href="index.php"> <img style="background-color:white" width="110"  height="40" class="img-rounded " src="images/869ToGocom_Logo_PNG-1030x515.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>


							<?php
						if(empty($_SESSION["user_id"])) // if user is not login
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
							}
						else
							{
									//if user is login

									echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';

							}

						?>

                        </ul>

                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>
        <?php
						$query_res= mysqli_query($db,"select * from users where u_id='".$_SESSION['user_id']."'");
						$row=mysqli_fetch_array($query_res);

						$query_id= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
						$random_row=mysqli_fetch_array($query_id);
					;?>
               <div class="page-wrapper" style="position:absolute;left:750px;top:150px;background-color:black;opacity:0.6;margin:20px 40px 20px 20px">
          <img src="images/Eo_circle_green_white_checkmark.svg.png" alt="Tick" width="100" height="100" style="  display: block;
  margin-left: auto;
  margin-right: auto;
  ">
<br>

               <h1 style="color:green;font-size:50px;margin-left:45px;margin-right:10px;">Your order has been confirmed.</h1>
                <h5 style="color:white;margin-left:80px;margin-right:10px;"> Hi, <?php echo  $row["username"] ?> we have received your order No: <?php echo $_SESSION["random_id"]?> and we are working on it now.</h5>
                <h5 style="color:white;margin-left:150px;margin-right:10px;">We'll email you an update when we've shipped it.</h5>
<br>

                <form action="your_orders.php"  method="post">
                <input type="submit" style=" display: block;margin-left: auto;
  margin-right: auto;"  name="submit"   class="btn btn-success" value="YOUR ORDERS">

</form>
<br>
<br>
<br>
<?php
		$_SESSION["random_id"] = rand();
		?>

</div>

</body>
</html>