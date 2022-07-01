<?php require_once('connection.php');
session_start();
?>
<?php require_once('place_order_p.php');?>

<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="place_order.css">
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
            <a href="index.php" class="nav-link">Home</a></li>

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
			  <li class="nav-item"><a href="index.php#aboutid" class="nav-link">About</a></li>
              <li class="nav-item"><a href="index.php#footerid" class="nav-link">Contact</a></li>
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

    <!-- Order======================================================================= -->
    <div class=" container-fluid my-5 ">
      <div class="row justify-content-center ">
          <div class="col-xl-10">
              <div class="card shadow-lg ">
                  
                  <div class="row justify-content-around">
                      <div class="col-md-5">
                          <div class="card border-0">
                              <div class="card-header pb-0">
                                  <h2 class="card-title space ">Place your order</h2>
                                  <p class="card-text text-muted mt-4 space">Please check your details carefully.</p>
                                  <hr class="my-0">
                              </div>
                               

                              <form action="" method="post">
                              <div class="card-body">
                              <div class="row mt-4">
                                      <div class="col">
                                          <p class="text-muted mb-2">CONTACT DETAILS</p>
                                          <hr class="mt-0">
                                      </div>
                                </div>

                  <?php if(isset($_SESSION['c_email'])){
                            $email = $_SESSION['c_email'];
                            $query = "SELECT * FROM customer WHERE c_email = '$email'";
                            $result = mysqli_query($connection,$query);
                            $row = mysqli_fetch_array($result);
                            ?>

                                <!-- <div class="form-group"> <label class="small text-muted mb-1">National Identity Card Number</label> <input type="text" class="form-control form-control-sm" name="nic" required> </div> -->
                                

                                <div class="row">
                    
                                <div class="col-lg-6">
                                    <div class="md-form md-outline mb-0 mb-lg-4">
                                    <label class="small text-muted mb-1">First name</label>
                                    <input type="text" class="form-control form-control-sm" value="<?php echo $row['c_fname']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="md-form md-outline">
                                    <label class="small text-muted mb-1">Last name</label>
                                    <input type="text" class="form-control form-control-sm" value="<?php echo $row['c_lname']; ?>">
                                    </div>
                                </div>
                                </div>

                                <div class="form-group"> <label class="small text-muted mb-1">Phone Number</label> <input type="number" class="form-control form-control-sm" value="<?php echo $row['c_tele']; ?>"> </div>
                                <div class="form-group"> <label class="small text-muted mb-1">Email Address</label> <input type="text" class="form-control form-control-sm" value="<?php echo $row['c_email']; ?>"> </div>  
                                
                                <div class="row mt-4">
                                      <div class="col">
                                          <p class="text-muted mb-2">DELIVERY DETAILS</p>
                                          <hr class="mt-0">
                                      </div>
                                  </div>
                                  <p class="card-text note"><b>NOTE :</b> We deliver orders around below areas only.</p>
                                  <div class="form-group">
                                    <label class="small text-muted mb-1">Select Delivery Location</label>
                                    <select class="form-control form-control-sm" name="area" style=" border: 1px solid #A30D5F;" required>
                                        <option value="">Select Delivery Area</option>
                                        <option value="Kadawatha">Kadawatha</option>
                                        <option value="Kiribathgoda">Kiribathgoda</option>
                                        <option value="Ragama">Ragama</option>
                                </select>
                                </div>

                                  <div class="form-group"> <label class="small text-muted mb-1">Address - Street</label> <input type="text" class="form-control form-control-sm" value="<?php echo $row['c_add_street']; ?>"> </div>
                                  <div class="row no-gutters">
                                      <div class="col-sm-6 pr-sm-2">
                                          <div class="form-group"> <label class="small text-muted mb-1">City</label> <input type="text" class="form-control form-control-sm" value="<?php echo $row['c_add_town']; ?>"> </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group"> <label class="small text-muted mb-1">Postal Code</label> <input type="text" class="form-control form-control-sm" value="<?php echo $row['c_add_postal']; ?>"> </div>
                                      </div>
                                  </div>

                                  <br>

                                  <div class="md-form md-outline mt-0">
                                        <input type="checkbox" data-toggle="collapse" data-target="#collapseExample">
                                        <label class="card-text note">If you want change delivery address</label>
                                    
                                        <div class="collapse" id="collapseExample">
                                        <div class="md-form md-outline mt-0">
                                            <label class="small text-muted mb-1">Address - Street</label>
                                            <input type="text" class="form-control form-control-sm" name="addstreet" style=" border: 1px solid #A30D5F;">
                                        </div>

                                            <div class="md-form md-outline mt-0">
                                            <label class="small text-muted mb-1">City</label>
                                            <input type="text" class="form-control form-control-sm" name="addcity" style=" border: 1px solid #A30D5F;">
                                            </div>

                                            <div class="md-form md-outline mt-0">
                                            <label class="small text-muted mb-1">Postal Code</label>
                                            <input type="text" class="form-control form-control-sm" name="addpostal" style=" border: 1px solid #A30D5F;">
                                            </div>
                                        </div>
                                    </div>

                                  
                                <?php }?>
                                

                                <br>
                                
                                <p class="card-text note"><b>NOTE :</b> We need 48 hours prepairing your order. (2 Days)</p>
                                <div class="form-group"> 
                                    <label class="small text-muted mb-1">Order Need Date</label> 
                                    <input type="date" class="form-control form-control-sm" name="ndate" style=" border: 1px solid #A30D5F;" required>
                                </div>

                                    <div class="row mt-4">
                                      <div class="col">
                                          <p class="text-muted mb-2">DELIVERY METHOD</p>
                                          <hr class="mt-0">
                                      </div>
                                  </div>

                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="ship" value="Pick up from shop" required>
                                  <label class="form-check-label" for="exampleRadios1">
                                    Pick up from shop
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="ship" value="Delivery" required>
                                  <label class="form-check-label" for="exampleRadios2">
                                    Delivery
                                  </label>
                                </div>
<br>
<br>
                                <!-- <div class="row mt-4">
                                  <div class="col">
                                      <p class="text-muted mb-2">PAYMENT METHOD</p>
                                      <hr class="mt-0">
                                  </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-10">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                      Cash on delivery
                                    </label>
                                  </div>
                                </div>
                              </div> -->

                              </div>
                          </div>
                      </div>





                      
                      <div class="col-md-5">
                          <div class="card border-0 ">
                              <div class="card-header card-2">
                                  <p class="card-text text-muted mt-md-4 mb-2 space">YOUR ORDER SUMMARY </p><a class="editshoppingcart" href="cart.php">EDIT SHOPPING CART</a>
                                  <hr class="my-2">
                              </div>
                              
                              <div class="card-body pt-0">




                              <?php 
                $count= 0;
                $total = 0;
                $cusid = $_SESSION['cid'];
                $query = "SELECT * FROM cart inner join product on cart.p_id = product.p_id WHERE cart.c_id = '$cusid' ";
                $result = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($result)){
                $count++;
                $total = $total + ($row['p_price'] * $row['qty']);
                $filenames = explode(",", $row['image']);
                ?>

                <input type="hidden" name="pid[]" value="<?php echo $row['p_id']; ?>">
                <input type="hidden" name="qty[]" value="<?php echo $row['qty']; ?>">
                            
                

                <input type="hidden" name="items" value="<?php echo $count; ?> Items"><br>
                <input type="hidden" name="currency" value="LKR">
                <input type="hidden" name="amount" value="<?php echo $total; ?>">
                

                                  <div class="row justify-content-between">
                                      <div class="col-auto col-md-7">
                                          <div class="media flex-column flex-sm-row"> <img class=" img-fluid" src="Admin/upload_g/server/uploads/<?php echo $filenames[0];?>" width="62" height="62">
                                              <div class="media-body my-auto">
                                                  <div class="row ">
                                                      <div class="col-auto">
                                                          <p class="mb-0"><b><?php echo $row['p_name']?></b></p><small class="text-muted">weight</small>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class=" pl-0 flex-sm-col col-auto my-auto">
                                          <p><?php echo $row['qty']?></p>
                                      </div>
                                      <div class=" pl-0 flex-sm-col col-auto my-auto ">
                                          <p><b>Rs. <?php echo ($row['p_price'] * $row['qty']); ?></b></p>
                                      </div>
                                     </div>
                                     <hr class="my-2">
                                  <?php }?>

                                 
                                  
                                  <div class="row ">
                                      <div class="col">
                                          <!-- <div class="row justify-content-between">
                                              <div class="col-4">
                                                  <p class="mb-1"><b>Subtotal</b></p>
                                              </div>
                                              <div class="flex-sm-col col-auto">
                                                  <p class="mb-1"><b>4,050.00</b></p>
                                              </div>
                                          </div>
                                          <div class="row justify-content-between">
                                              <div class="col">
                                                  <p class="mb-1"><b>Delivery</b></p>
                                              </div>
                                              <div class="flex-sm-col col-auto">
                                                  <p class="mb-1"><b>400.00</b></p>
                                              </div>
                                          </div> -->
                                          <div class="row justify-content-between">
                                              <div class="col-4">
                                                  <p><b>Total</b></p>
                                              </div>
                                              <div class="flex-sm-col col-auto">
                                                  <p class="mb-1" name="tot"><b>Rs. <?php echo $total; ?></b></p>
                                              </div>
                                          </div>
                                          <hr class="my-0">
                                      </div>
                                  </div>
                                  
                                  <div class="orderbutton">
                                    <div class="obtn"> <button type="submit" name="submit" class="placeorderbtn">PLACE ORDER</button> </div>
                                </div>
                                
                              </div>
                          </div>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End of Order======================================================================= -->


     <!-- Optional JavaScript -->
     <?php include("floatingbtn.php");?>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <!-- <script src="sweetalert.js"></script> -->
            <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
            {
            ?>
            <script>
                    swal({
                title: "<?php echo $_SESSION['status']; ?>",
                text: "<?php echo $_SESSION['status_text']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "OK",
                });
                </script>
            <?php
            unset($_SESSION['status']);
            }
            ?>
  
  
  
    </body>
 </html>
 <?php mysqli_close($connection);?>