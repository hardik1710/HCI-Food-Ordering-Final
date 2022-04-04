<!DOCTYPE html>
<html lang="en">
<?php

session_start(); //temp session
error_reporting(0); // hide undefine index
include("connection/connect.php"); // connection
if(isset($_POST['submit'] )) //if submit btn is pressed
{
     if(empty($_POST['firstname']) ||  //fetching and find if its empty
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']) ||
        empty($_POST['creditcard']) ||
        empty($_POST['creditmonth']) ||
        empty($_POST['credityear']) ||
        empty($_POST['CVV']))
		{
			$message = "*All fields must be Required!";
		}
	else
	{
		//cheching username & email if already present
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  //matching passwords
       	$message = "*Password not match";
    }
	elseif(strlen($_POST['password']) < 6)  //cal password length
	{
		$message = "*Password Must be >=6";
	}
	elseif(strlen($_POST['phone']) < 10)  //cal phone length
	{
		$message = "*Invalid phone number!";
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
    {
       	$message = "*Invalid email address please type a valid email!";
    }
	elseif(mysqli_num_rows($check_username) > 0)  //check username
     {
    	$message = '*Username already exists!';
     }
	elseif(mysqli_num_rows($check_email) > 0) //check email
     {
    	$message = '*Email Already exists!';
     }
    elseif(strlen($_POST['creditcard']) != 16)  //credit card password length
    {
        $message = "*Credit card number Must be = 16";
    }
    elseif(strlen($_POST['creditmonth']) != 2)  //credit card password length
    {
        $message = "*Creditmonth Must be = 2";
    }
    elseif(strlen($_POST['credityear']) != 2)  //credit card password length
    {
        $message = "*Credityear must be = 2";
    }
    elseif(strlen($_POST['CVV']) != 3)  //credit card password length
    {
        $message = "*CVV Must be = 3";
    }
    else{

	 //inserting values into db
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address,credit_card,credit_month,credit_year,CVV) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."','".$_POST['creditcard']."','".$_POST['creditmonth']."','".$_POST['credityear']."','".$_POST['CVV']."')";
	mysqli_query($db, $mql);
		$success = "Account Created successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
														<script type='text/javascript'>
														function countdown() {
															var i = document.getElementById('counter');
															if (parseInt(i.innerHTML)<=0) {
																location.href = 'login.php';
															}
															i.innerHTML = parseInt(i.innerHTML)-1;
														}
														setInterval(function(){ countdown(); },1000);
														</script>'";
		
		
		


		 header("refresh:5;url=login.php"); // redireted once inserted success
    }
	}

}


?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>869ToGo.com</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
<body style="background-image: url('images/background.jpg');  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;" >
     
         <!--header starts-->
         <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
               <div class="container">
                  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                                     <a class="navbar-brand" href="index.php"> <img style="background-color:white" width="130"  height="60" class="img-rounded " src="images/869ToGocom_Logo_PNG-1030x515.png" alt=""> </a>
                  <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                     <ul class="nav navbar-nav">
							<li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{

								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Signup</a> </li>';
							}
						else
							{

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
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">

					</a></li>
                    
                  </ul>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-8" style="margin-left:200px">
                        <div class="widget">
                           <div class="widget-body">
                              
                             <h2 style="color:#f30 ;text-align:center">REGISTER</h2>
							  <form action="" method="post">
                                 <div class="row">
                                           <span style="color:red;font-size:20px,text-align:center;"><?php echo $message; ?></span>
					   <span style="color:green;font-size:20px,text-align:center;">
								<?php echo $success; ?>
										</span>
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">User-Name<span class="required" style="color:red">*</span></label>
                                       <input class="form-control" type="text" name="username" id="example-text-input" placeholder="UserName"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">First Name<span class="required" style="color:red">*</span></label>
                                       <input class="form-control" type="text" name="firstname" id="example-text-input" placeholder="First Name"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Last Name<span class="required" style="color:red">*</span></label>
                                       <input class="form-control" type="text" name="lastname" id="example-text-input-2" placeholder="Last Name"> 
                                    </div>
                                     <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email address<span class="required" style="color:red">*</span></label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small> 
                                     </div>
                                     <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Phone number<span class="required" style="color:red">*</span></label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="Phone"> <small class="form-text text-muted">We"ll never share your phone number with anyone else.</small>
                                     </div>
                                     <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Password<span class="required" style="color:red">*</span></label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password"> 
                                     </div>
                                     <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Repeat password<span class="required" style="color:red">*</span></label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Password"> 
                                     </div>
                                     <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Delivery Address<span class="required" style="color:red">*</span></label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                     </div>
                                     <div class="form-group col-sm-12">

                                         <label for="exampleTextarea">----------------------------------Add The Payment Method For Faster Checkout----------------------------------</label>

                                     </div>
                                     <div class="form-group col-sm-12">
                                         <label for="exampleTextarea">Payment<span class="required" style="color:red">*</span></label>
                                         <input class="form-control" type="text" name="creditcard" id="example-text-input"   placeholder="Credit Card Number">
                                     </div>
                                     <div class="form-group col-sm-4">
                                         <label for="exampleInputEmail1">Month<span class="required" style="color:red">*</span></label>
                                         <input class="form-control" type="text" name="creditmonth" id="example-text-input" placeholder="Month (2 digits)">
                                     </div>
                                     <div class="form-group col-sm-4">
                                         <label for="exampleInputEmail1">Year<span class="required" style="color:red">*</span></label>
                                         <input class="form-control" type="text" name="credityear" id="example-text-input" placeholder="Year (2 digits)">
                                     </div>
                                     <div class="form-group col-sm-4">
                                         <label for="exampleInputEmail1">CVV<span class="required" style="color:red">*</span></label>
                                         <input class="form-control" type="text" name="CVV" id="example-text-input" placeholder="CVV (3 digits)">
                                     </div>
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p style="margin-left:290px"> <input style="width:150px" type="submit" value="Register" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form>
                           
						   </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                     </div>

            </section>
                           </div>
                              <!-- Featured restaurants ends -->
            <section class="app-section">
                <div class="app-wrap">
                    <div class="container">
                        <div class="row text-img-block text-xs-left">
                            <div class="container">
                                <div class="col-xs-12 col-sm-6 hidden-xs-down right-image text-center">
                                    <figure> <img src="images/app.png" alt="Right Image"> </figure>
                                </div>
                                <div class="col-xs-12 col-sm-6 left-text">
                                    <h3>The Best Food Delivery App</h3>
                                    <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery App.</p>
                                    <div class="social-btns">
                                        <a href="https://www.apple.com/ca/app-store/" class="app-btn apple-button clearfix">
                                            <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                            <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                                        </a>
                                        <a href="https://play.google.com/store" class="app-btn android-button clearfix">
                                            <div class="pull-left"><i class="fa fa-android"></i> </div>
                                            <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- start: FOOTER -->
            <footer class="footer">
                <div class="container">
                    <!-- top footer statrs -->
                    <div class="row top-footer">
                        <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                            <a href="#"> <img style="background-color:white;" width="110"  height="40" class="img-rounded" src="images/869ToGocom_Logo_PNG-1030x515.png" alt="Footer logo"> </a> </div>

                    </div>
                    <!-- top footer ends -->
                    <!-- bottom footer statrs -->
                    <div class="row bottom-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                    <h5>Payment Options</h5>
                                    <ul>
                                        <li>
                                            <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 address color-gray">
                                    <h5>Address</h5>
                                    <p>Concept design of oline food order and deliveye,planned as restaurant directory</p>
                                    <h5>Phone: <a href="#">(+1) 236-568-5987</a></h5> </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Addition informations</h5>
                                    <p>Join the thousands of other restaurants who benefit from having their menus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- bottom footer ends -->
                </div>
            </footer>
            <!-- end:Footer -->
        </div>
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>