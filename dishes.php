<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); // connection to db
error_reporting(0);
session_start();

include_once 'product-action.php'; //including controller

if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else
{


												foreach ($_SESSION["cart_item"] as $item)
												{

												$item_total += ($item["price"]*$item["quantity"]);

													if($_POST['submit'])
													{


            $SQL="insert into users_orders(u_id,title,quantity,price,address,credit_card,credit_month,credit_year,CVV,random_id) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."','".$_SESSION['address']."','".$_SESSION['credit_card']."','".$_SESSION['credit_month']."','".$_SESSION['credit_year']."','".$_SESSION['CVV']."','".$_SESSION["random_id"]."')";

														mysqli_query($db,$SQL);
														header("refresh:1;url=confirmation.php");
														$_SESSION["cart_item"]=null;
													}else{
                                                            //Do Nothing
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
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

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
                            if (empty($_SESSION["user_id"])) {
                                echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
                            } else {


                                echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
                                echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
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

                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>
            <div class="container">

                <span style="color:green;">
                    <?php echo $success; ?>
                </span>

            </div>
            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <?php $ress = mysqli_query($db, "select * from restaurant where rs_id='$_GET[res_id]'");
            $rows = mysqli_fetch_array($ress);

            ?>
            <section class="inner-page-hero bg-image" data-image-src="images/img/dish.jpeg">
                <div class="profile">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                                <div class="image-wrap">
                                    <figure><?php echo '<img src="admin/Res_img/' . $rows['image'] . '" alt="Restaurant logo">'; ?></figure>
                                </div>
                            </div>
                          
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc" style="text-align:right">

                                <div class="pull-left right-text white-txt">
                                    <h6><a href="#" style=";font-size:40px"><?php echo $rows['title']; ?></a></h6>
                                    <p><?php echo $rows['address']; ?></p>
                                    <ul class="nav nav-inline">
                                        <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min $ 10,00</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i> 30 min</a> </li>
                                        <li class="nav-item ratings">
                                            <a class="nav-link" href="#"> <span>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
            <!-- end:Inner page hero -->
            <div class="breadcrumb" width="200">
                <div class="container">

                </div>
            </div>
            <div class="container m-t-30" >
                <div class="row" >
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="width:400px">

                        <div class="widget widget-cart" >
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Your Shopping Cart
                                </h3>


                                <div class="clearfix"></div>
                            </div>
                            <div class="order-row bg-white">
                                <div class="widget-body">
<?php
$item_total = 0;
foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
{
?>
                                    <div class="title-row">
                                        <?php echo $item["title"]; ?><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
                                            <i class="fa fa-trash pull-right"></i></a>
                                    </div>

                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "$" . $item["price"]; ?> readonly id="exampleSelect1">

                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>

                                    </div>
<?php
$item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
}
?>
                                </div>
                            </div>


                            <!-- MODAL------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                            <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">One Click Checkout</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="title-row">

                                                <div class="cart-totals margin-b-20">
                                                    <div class="cart-totals-title">
                                                        <h4>Order Summary</h4>
                                                    </div>
                                                                                                         <?php
$item_total = 0;
foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
{
?>
        
                                                    <?php echo $item["title"]; ?><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
                                                <i class="fa fa-trash pull-right"></i></a>
                                                </div>

                                                <div class="form-group row no-gutter">
                                                    <div class="col-xs-8">
                                                        <input type="text" class="form-control b-r-0" value=<?php echo "$" . $item["price"]; ?> readonly id="exampleSelect1">

                                                    </div>
                                                    <div class="col-xs-4">
                                                        <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                                    </div>
 <?php
$item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
}
?>
                                                </div>

                                                
                                                    <div class="widget clearfix">

                                                        <div class="widget-body">
                                                            <form method="post" action="" id = "cartForm">
                                                                <div class="row">

                                                                    <div class="col-sm-12">
                                                                        <div class="cart-totals margin-b-20">
                                                                            <div class="cart-totals-title">
                                                                                <h4>Cart Summary</h4>
                                                                            </div>
                                                                            <div class="cart-totals-fields">
                                                                                <table class="table">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Cart Subtotal</td>
                                                                                            <td> <?php echo "$" . $item_total; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Shipping &amp; Handling</td>
                                                                                            <td>free shipping</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="text-color"><strong>Total</strong></td>
                                                                                            <td class="text-color"><strong> <?php echo "$" . $item_total; ?></strong></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <p class="text-xs-center"> <input type="submit" onClick ="return confirm('Are you sure?');" name="submit" class="btn btn-outline-success btn-block" value="Order now"></p>
                                                                        
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end:Order row -->

                    <div class="widget-body">
                        <div class="price-wrap text-xs-center">
                            <p>TOTAL</p>
                            <h3 class="value"><strong><?php echo "$" . $item_total; ?></strong></h3>
                            <p>Free Shipping</p>
                            <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check" class="btn theme-btn btn-lg">Checkout</a>
                            <p></p>
                            <a href="#?res_id=<?php echo $_GET['res_id']; ?>&action=" data-toggle="modal" data-target="#checkoutModal" class="btn theme-btn btn-lg">One Click Checkout</a>

                        </div>
                    </div>




                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">

                <!-- end:Widget menu -->
                <div class="menu-widget" id="2">
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                            POPULAR ORDERS Delicious hot food! <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                <i class="fa fa-angle-right pull-right"></i>
                                <i class="fa fa-angle-down pull-right"></i>
                            </a>
                        </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="collapse in" id="popular2">
                        <?php  // display values and item of food/dishes
                        $stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
                        $stmt->execute();
                        $products = $stmt->get_result();
                        if (!empty($products)) {
                            foreach ($products as $product) {

                        ?>
                                <div class="food-item" >
                                    <div class="row"  >
                                        <div class="col-xs-12 col-sm-12 col-lg-8" >
                                            <form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                <div class="rest-logo pull-left">
                                                    <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/dishes/' . $product['img'] . '" alt="Food logo">'; ?></a>
                                                </div>
                                                <!-- end:Logo -->
                                                <div class="rest-descr">
                                                    <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                    <p> <?php echo $product['slogan']; ?></p>
                                                </div>
                                                <!-- end:Description -->
                                        </div>
                                        <!-- end:col -->
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info">
                                            <span class="price pull-left">$<?php echo $product['price']; ?></span>
                                            <div class="col-xs-8">
                                                <input class="form-control" type="number" min="1" max="" name="quantity" class="input-text qty text" title="Qty" value="1" size="2" pattern="" inputmode="" /> <!-- piyush -->
                                            </div><input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add to cart" />
                                        </div>
                                        </form>
                                    </div>
                                    <!-- end:row -->
                                </div>
                                <!-- end:Food item -->

                        <?php
                            }
                        }

                        ?>



                    </div>
                </div>
            </div>
            <!-- end:Right Sidebar -->
        </div>
        <!-- end:row -->
        </div>
        <!-- end:Container -->
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
                                    <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-useFood Delivery App.</p>
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
        <!-- end:page wrapper -->
        </div>
        <!--/end:Site wrapper -->
        <!-- Modal -->
        <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <div class="modal-body cart-addon">
                        <div class="food-item white">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-6">
                                    <div class="item-img pull-left">
                                        <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                        <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                    </div>
                                    <!-- end:Description -->
                                </div>
                                <!-- end:col -->
                                <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.99</span></div>
                                <div class="col-xs-6 col-sm-4 col-lg-4">
                                    <div class="row no-gutter">
                                        <div class="col-xs-7">
                                            <select class="form-control b-r-0" id="exampleSelect2">
                                                <option>Size SM</option>
                                                <option>Size LG</option>
                                                <option>Size XL</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-5">
                                            <input class="form-control" type="number" value="0" id="quant-input-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end:row -->
                        </div>
                        <!-- end:Food item -->
                        <div class="food-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-6">
                                    <div class="item-img pull-left">
                                        <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                        <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                    </div>
                                    <!-- end:Description -->
                                </div>
                                <!-- end:col -->
                                <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.49</span></div>
                                <div class="col-xs-6 col-sm-4 col-lg-4">
                                    <div class="row no-gutter">
                                        <div class="col-xs-7">
                                            <select class="form-control b-r-0" id="exampleSelect3">
                                                <option>Size SM</option>
                                                <option>Size LG</option>
                                                <option>Size XL</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-5">
                                            <input class="form-control" type="number" value="0" id="quant-input-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end:row -->
                        </div>
                        <!-- end:Food item -->
                        <div class="food-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-6">
                                    <div class="item-img pull-left">
                                        <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                        <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                    </div>
                                    <!-- end:Description -->
                                </div>
                                <!-- end:col -->
                                <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 1.99</span></div>
                                <div class="col-xs-6 col-sm-4 col-lg-4">
                                    <div class="row no-gutter">
                                        <div class="col-xs-7">
                                            <select class="form-control b-r-0" id="exampleSelect5">
                                                <option>Size SM</option>
                                                <option>Size LG</option>
                                                <option>Size XL</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-5">
                                            <input class="form-control" type="number" value="0" id="quant-input-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end:row -->
                        </div>
                        <!-- end:Food item -->
                        <div class="food-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-6">
                                    <div class="item-img pull-left">
                                        <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                        <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                    </div>
                                    <!-- end:Description -->
                                </div>
                                <!-- end:col -->
                                <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 3.15</span></div>
                                <div class="col-xs-6 col-sm-4 col-lg-4">
                                    <div class="row no-gutter">
                                        <div class="col-xs-7">
                                            <select class="form-control b-r-0" id="exampleSelect6">
                                                <option>Size SM</option>
                                                <option>Size LG</option>
                                                <option>Size XL</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-5">
                                            <input class="form-control" type="number" value="0" id="quant-input-5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end:row -->
                        </div>
                        <!-- end:Food item -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn theme-btn">Add to cart</button>
                    </div>
                </div>
            </div>
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
<?php
}
?>