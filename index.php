<?php require_once('connection.php');?>
<?php require_once('reviews.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="floatingbtn.css">

    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navigation Bar======================================================================= -->
    <nav class="navbar navbar-expand-lg" id="my-navbar">
	    <div class="container">
	      <a class="navbar-brand font-weight-bold brand-color" href="index.php"><img src="images/imalka cake.svg" width="260px" alt=""></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" 
		 data-target="#my-nav" aria-controls="my-nav" aria-expanded="false" 
		 aria-label="Toggle navigation">
	        <span ><i class="fa fa-bars"></i></span>
	      </button>

	      <div class="collapse navbar-collapse" id="my-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item">
            <a href="index.php" class="nav-link active">Home</a></li>

	        <!-- Dropdown List -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Menu</a>
                    <div class="dropdown-menu">
                    <?php
                require_once('connection.php');

            	$query = "SELECT * FROM category";
                $result = mysqli_query($connection,$query); 
                while($row = mysqli_fetch_array($result)){?>
                         <a class="dropdown-item" href="shorteats.php?mcategory=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a>
                         <?php } ?>
                        </div>
             </li>
            
	          <li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
			  <li class="nav-item"><a href="#aboutid" class="nav-link">About</a></li>
              <li class="nav-item"><a href="#footerid" class="nav-link">Contact</a></li>
			    <li class=" d-none d-xl-block">				
				  <li class="nav-item"><a href="wishlist.php"class="nav-link">
				<i class="fas fa-heart"></i></a></li>		
			    </li>
	    	 <li class="nav-item"><a href="cart.php" class="nav-link">
              <i class="fas fa-shopping-cart"></i></a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> <i class="fa fa-user" aria-hidden="true"></i> </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">My profile</a>
                    <a class="dropdown-item" href="myorders.php">My Orders</a>
                        <hr>
                        <a class="dropdown-item" href="login.php">Login</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
            </li>
	        </ul>
	      </div>
	    </div>
	  </nav>
      <!--<hr style="height:2px; margin: 0; background-color: #50006b">-->
    <!-- End of Navigation Bar======================================================================= -->

    <!-- Home Banner ======================================================================= -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Baking Delight</h1>
          <h2 class="display-2">Filled Memories</h2>
          <a class="btn" href="upload_c/customize.php"><i class="fas fa-birthday-cake"></i>Make Your Dream Cake </a>
        </div>
      </div>
    <!-- End of Home Banner ======================================================================= -->
    <br>
    <br>

    <!--best products==============================================================================-->
    
    <!--end best product===========================================================================-->


    <!-- Cards ======================================================================= -->
    <section class="Csec">
        <div class="team-grid">
            <div class="container">
                <div class="aboutus">
                    <h2 class="whatweoffer-title">What we offer</h2>
                    <hr class="whatweoffer-after">
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card mx-30">
                          <img src="images/cake.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">
                                  Cakes</h5>
                                  <!-- <h6>Available Categories</h6> -->
                                  <!--<p class="card-text">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse amet repellat, eaque aliquid similique eius alias facilis quisquam, ipsa dolor.</p>-->
                                  <div class="offer-mgk">
                                    <!-- <h7>Cup Cakes</h7><br>
                                    <h7>Birthday Cakes</h7><br>
                                    <h7>Wedding Cakes</h7><br> -->
                                  </div>
                                  <br>
                                  <br>
                                  <div class="socials">
                                <!--<a href="#"><i class="fa fa-facebook"></i></a>-->
                                <!-- <a href="cake.php">
                                    <button class="offer">More details</button> -->
                                </a>
                            </div>
        </div>
        </div>
        </div>
        <div class="col-md-6 col-lg-4">
                        <div class="card mx-30">
                          <img src="images/short_eat.png" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Short Eats</h5>
                    <!-- <h6>Available Categories</h6> -->
                    <div class="offer-mgk">
                      <!-- <h7>Rolls</h7><br>
                      <h7>Cutlets</h7><br>
                      <h7>Patis</h7><br>
                      <h7>Roasted Sandwiches</h7><br> -->
                    </div>
                    <br>
                    <br>
                    <div class="socials">
                    <!-- <a href="shorteats.php">
                      <button class="offer">More details</button>   
                    </a>  -->
                    </div>
        </div>
        </div>
        </div>
        <div class="col-md-6 col-lg-4">
                        <div class="card mx-30">
                          <img src="images/package.png" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Packages</h5>
                            <!-- <h6>Available Categories</h6> -->
                            <div class="offer-mgk">
                              <!-- <h7>Premium</h7><br>
                              <h7>Platinum</h7><br>
                              <h7>Gold</h7><br>
                              <h7>Silver</h7><br> -->
                            </div>
                            <br>
                            <br>
                            <div class="socials">
                            <!-- <a href="packages.php">
                              <button class="offer">More details</button>
                            </a> -->
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- End of Cards ======================================================================= -->

    <!-- New Product ======================================================================= -->
    <section class="Csec">
        <div class="team-grid">
            <div class="container">
                <div class="aboutus">
                    <h2 class="whatweoffer-title">Latest products</h2>
                    <hr class="whatweoffer-after">
                </div>

                <div class="row">
                <?php  
        $query = "SELECT * FROM product ORDER BY p_id DESC LIMIT 8";
        $result = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($result)){


         $filenames = explode(",", $row['image']);
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid6">
                    <div class="product-image6">
                        <a href="single_p.php?mcategory=<?php echo $row['p_id']; ?>">
                            <img class="pic-1" src="Admin/upload_g/server/uploads/<?php echo $filenames[0];?>">
                        </a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#"><?php echo $row['p_name']?></a></h3>
                        <div class="price">Rs. <?php echo $row['p_price']?>
                        </div>
                        <!-- <div class="pieces">20 x (50) pieces</div> -->
                    </div>
                    
                    <ul class="social">
                        <li><a href="single_p.php?mcategory=<?php echo $row['p_id']; ?>" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <!-- <li><a href="" name="submit_to_wishlist" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="" name="submit_to_cart" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li> -->
                    </ul>
                </div>
            </div>
            <?php } ?>
        </div>




                </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <!-- End of New Product ======================================================================= -->

    <!---About Us Section =================================================================-->
<section class="sec" id="aboutid">
    <div class="aboutus-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus">
                        <h2 class="aboutus-title">About Us</h2>
                        <br>
                        <br>
                        <p class="aboutus-text">‘Imalka Cake Creations’ , the name itself, shows that we plan the cakes 
                            that precisely suit your decision whatever event it’s. We are at your administration for a few years, 
                            however concoct a wide scope of cakes and pastries.Owner Name puts stock in development and 
                            endeavors to present something new and something other than what’s expected to meet all 
                            client prerequisites. 
                        </p>

                        <p class="aboutus-text">Our crisp, inventive and enticing cakes draw in individuals. 
                            ‘Imalka Cake Creations’ gets ready extreme cakes with an icing of feelings and love over them. 
                            We have an assortment of cake plans and attempt to concoct new thoughts unfailingly.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus-banner">
                        <img src="images/aboutbanner.png">
                    </div>
                </div>
            </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
</section>
    <!---End of About Us Section=================================================================-->

    <!---Feedback Section=================================================================-->
    <div class="container">
        <div class="aboutus">
            <h2 class="customersay-title">What our customers say</h2>
        </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol> <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
            <?php 
                      $no = 0;
                    //   $fname =  $_SESSION['fname'];
                    //  $lname =  $_SESSION['lname'];
                    	$query = "SELECT * FROM feedback INNER JOIN customer ON feedback.c_id = customer.c_id";
                      $result = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_array($result)){
                      $no++;
                    ?>
                <div class="item carousel-item <?php if($no==1){ echo 'active'; }?>">
                    <p class="testimonial"><?php echo $row['f_des']; ?></p>
                    <p class="overview"><b><?php echo $row['c_fname']." ".$row['c_lname']; ?></b><?php echo $row['f_type']; ?></p>
                </div>
                <?php }?>
            </div>
            <!-- Carousel controls --> 
            <div>
                <span><a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev"> 
                <i class="fa fa-angle-left"></i> </a> 
                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next"> 
                    <i class="fa fa-angle-right"></i> </a>
                </span>
            </div>
            
            </div>
            
        
    </div>
    <div class="text-center">
    <a href="feedback.php">
        <button class="feedbackbtn">What do you think about us</button>
    </a>
      </div>
    <!---End of Feedback Section=================================================================-->

    <!-- Footer ===================================================================== -->
    <div class="mt-5 pt-5 pb-5 footer" id="footerid">
        <div class="container">
            <div class="row mb-4 ">
                <div class="col-md-4 col-sm-11 col-xs-11">
                    <div class="footer-text pull-left">
                        <div class="d-flex">
                            <img src="images/imalka cake.svg" width="350px" alt="">
                        </div>
                        
                        <hr style="background-color: #c23582;">
                        <p class="card-textp">Imalka Cake Creations</p>
                        <p class="card-textp"><i class="fa fa-home"></i> 160/29C,Kirimatiyagara Kadawatha, Sri Lanka</p>
                        <p class="card-textp"><i class="fa fa-phone"></i> +94 775970007</p>
                        <p class="card-textp"><i fas class="fa fa-envelope" aria-hidden="true"></i> imalkacakecreations@gmail.com</p>
                        
                        <hr style="height: 1px; background-color: #ffffff;">
                        <div class="social mt-2 mb-3"><a href="https://www.facebook.com/Imalka-Cake-Creations-346336505698770"><i class="fab fa-facebook-square"></i></a></div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-1 col-xs-1 mb-2"></div>
                <div class="col-md-2 col-sm-4 col-xs-4">
                    <h5 class="heading">Categories</h5>
                    <ul class="card-text">
                    <?php
                require_once('connection.php');

            	$query = "SELECT * FROM category";
                $result = mysqli_query($connection,$query); 
                while($row = mysqli_fetch_array($result)){?>
                    <li><a href="shorteats.php?mcategory=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a></li><br>
                    <?php } ?>
                    <!-- <li><a href="cake.php">Cup Cakes</a></li><br>
                    <li><a href="cake.php">Wedding Cakes</a></li><br>
                    <li><a href="shorteats.php">Short Eats</a></li><br>
                    <li><a href="packages.php">Packages</a></li> -->
                    </ul>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-4">
                    <h5 class="heading">Quick link</h5>
                    <ul class="card-text">
                    <li><a href="index.php">Home</a></li><br>
                    <li><a href="gallery.php">Gallery</a></li><br>
                    <li><a href="#aboutid">About Us</a></li><br>  
                    <li><a href="login.php">Login</a></li><br> 
                    <li><a href="register.php">Register</a></li>
                    </ul>
                </div>
            </div>
            <div class="divider mb-4"> </div>
            <div class="row" style="font-size:10px;">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="pull-left">
                        <p><i class="fa fa-copyright"></i> 2021 Imalka Cake Creations</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Footer ===================================================================== -->
<?php include("floatingbtn.php");?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php mysqli_close($connection)?>