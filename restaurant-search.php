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

<body class ="home">
    
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
<div class="page-wrapper">
            <!-- top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                       
                        <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>   
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($db, $_POST['search']);
            
            ?>


            <h2 class="text-white">Restaurants on Your Search <a href="#" style="color:green">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    
    <section class="featured-restaurants">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title-block pull-left">
                        <h4>Related Search</h4> </div>
                </div>
            </div>
            
                <div class ="row">
                    <div class="restaurant-listing">
                        <?php 

                        //SQL Query to Get foods based on search keyword
                        //$search = burger '; DROP database name;
                        // "SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
                        $sql = "SELECT * FROM restaurant WHERE title LIKE '%$search%'";
                        
                        //Execute the Query
                        $res = mysqli_query($db, $sql);

                        //Count Rows
                        $count = mysqli_num_rows($res);
                        //Check whether food available of not
                        if($count>0)
                        {
                            //Food Available
                            while($rows=mysqli_fetch_array($res))
                            {
                                $query= mysqli_query($db,"select * from res_category where c_id='".$rows['c_id']."' ");
								$rowss=mysqli_fetch_array($query);
						
								echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all '.$rowss['c_name'].'">
                                   <div class="restaurant-wrap">
                                       <div class="row">
                                           <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
                                               <a class="restaurant-logo" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo"> </a>
                                           </div>
                                           <!--end:col -->
                                           <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                                               <h5><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
                                               <div class="bottom-part">
                                                   <div class="cost"><i class="fa fa-check"></i> Min $ 10,00</div>
                                                   <div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
                                                   <div class="ratings"> <span>
                                                           <i class="fa fa-star"></i>
                                                           <i class="fa fa-star"></i>
                                                           <i class="fa fa-star"></i>
                                                           <i class="fa fa-star"></i>
                                                           <i class="fa fa-star-o"></i>
                                                       </span> (122) </div>
                                               </div>
                                           </div>
                                           <!-- end:col -->
                                       </div>
                                       <!-- end:row -->
                                   </div>
                                   <!--end:Restaurant wrap -->
                               </div>';
                                            
                            }
                        }
                        else
                        {
                            //Food Not Available
                            echo "<div class='error'>Restaurant not found.</div>";
                        }
                    
                        ?>
                    </div>
                </div>

            </div>
                    </div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
                    </div>
</body>
</html>