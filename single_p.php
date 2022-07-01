<?php require_once('connection.php');
session_start();
?>
<?php require_once('cart_p.php');?>
<?php require_once('wishlist_p.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="single_p.css">
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

    <!-- Single Product ----------------------------------------------------- -->
   
    <div class="container">
            <div class="card" style="background-color: #ffe8f5; margin-top: 40px; padding: 30px; border: none;">
                
            

  <div class="row">


    <div class="col-md-6 mb-4 mb-md-0">

      <div id="mdb-lightbox-ui"></div>

      <div class="mdb-lightbox">

        <div class="row product-gallery mx-1">


        <?php 
                      $catid= $_GET['mcategory'];
                      $query = "SELECT * FROM product inner join category on product.cat_id = category.cat_id where product.p_id='$catid'";
                      $result = mysqli_query($connection,$query);
                      
                      while($row = mysqli_fetch_array($result)){
                        $filenames = explode(",", $row['image']);
                        ?>
          <div class="col-12 mb-0 text-center">
                <img src="Admin/upload_g/server/uploads/<?php echo $filenames[0];?>"
                  class="img-fluid z-depth-1" width="300px">
          </div>
        </div>

      </div>

    </div>
    <div class="col-md-6">

      <h5 class="topic"><?php echo $row['p_name']; ?></h5>
      <p class="mb-2 text-muted small"><?php echo $row['cat_name']; ?></p>

      <p><span class="mr-1"><strong>Rs. <?php echo $row['p_price']; ?></strong></span></p>
      <p class="wftopic"><?php echo $row['wf']; ?></p>
      <p class="pt-1"><?php echo $row['p_des']; ?></p>

      <!-- <div class="table-responsive">
        <table class="table table-sm table-borderless mb-0">
          <tbody>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
              <td>Shirt 5407X</td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
              <td>Black</td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
              <td>USA, Europe</td>
            </tr>
          </tbody>
        </table>
      </div> -->
      <hr>

      <form action="" method="post">
      <div class="table-responsive mb-2">
        <table class="table table-sm table-borderless">
          <tbody>
            
            <!-- <tr>
              <td class="pb-0">Select Weight</td>
            </tr>
            <tr>
              <td>
              <select class="form-control" id="exampleFormControlSelect1" name="weight">
                <option value="1">500g</option>
                <option value="2">1Kg</option>
                <option value="4">2Kg</option>
                <option value="6">3Kg</option>
              </select>


                <!-- <div class="mt-1">
                  <div class="form-check form-check-inline pl-0">
                    <input type="radio" class="form-check-input" id="400g" name="materialExampleRadios"
                      checked>
                    <label class="form-check-label small text-uppercase card-link-secondary"
                      for="400g">400g</label>
                  </div>
                  <div class="form-check form-check-inline pl-0">
                    <input type="radio" class="form-check-input" id="1kg" name="materialExampleRadios">
                    <label class="form-check-label small text-uppercase card-link-secondary"
                      for="1kg">1Kg</label>
                  </div>
                  <div class="form-check form-check-inline pl-0">
                    <input type="radio" class="form-check-input" id="2kg" name="materialExampleRadios">
                    <label class="form-check-label small text-uppercase card-link-secondary"
                      for="2kg">2Kg</label>
                  </div>
                  <div class="form-check form-check-inline pl-0">
                    <input type="radio" class="form-check-input" id="3kg" name="materialExampleRadios">
                    <label class="form-check-label small text-uppercase card-link-secondary"
                      for="3kg">3Kg</label>
                  </div>
                </div> -->
              <!-- </td>
            </tr> -->



            <!-- <tr>
              <td class="pb-0">Select Flavour</td>
            </tr>
            <tr>
              <td>
                <div class="mt-1">
                  <div class="form-check form-check-inline pl-0">
                    <input type="radio" class="form-check-input" id="vege" name="materialExampleRadios1"
                      checked>
                    <label class="form-check-label small text-uppercase card-link-secondary"
                      for="vege">Vege</label>
                  </div>
                  <div class="form-check form-check-inline pl-0">
                    <input type="radio" class="form-check-input" id="egg" name="materialExampleRadios1">
                    <label class="form-check-label small text-uppercase card-link-secondary"
                      for="egg">Egg</label>
                  </div>
                  <div class="form-check form-check-inline pl-0">
                    <input type="radio" class="form-check-input" id="fish" name="materialExampleRadios1">
                    <label class="form-check-label small text-uppercase card-link-secondary"
                      for="fish">Fish</label>
                  </div>
                  <div class="form-check form-check-inline pl-0">
                    <input type="radio" class="form-check-input" id="chicken" name="materialExampleRadios1">
                    <label class="form-check-label small text-uppercase card-link-secondary"
                      for="chicken">Chicken</label>
                  </div>
                </div>
              </td>
            </tr>  -->



            <tr>
              <td class="pl-0 pb-0 w-25">Quantity</td>
            </tr>
            <tr>
              <td class="pl-0">
                    <input type = "number" min = "1" value = "1" name="qty">
              </td>
            </tr>
            <input type="hidden" name="pid" value="<?php echo $row['p_id']; ?>">

          </tbody>
        </table>
      </div>
      <button type="submit" class="btn btn-light btn-md mr-1 mb-2" name="submit_to_cart"><i
          class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
      <button type="submit" class="btn btn-primary btn-md mr-1 mb-2" name="submit_to_wishlist"><i class="fas fa-heart pr-2"></i>Wishlist</button>
    
      </form>
      
       </div>
    <?php }?>
  </div>







            </div>
    </div>
    <br>
    <br>

    <!-- End of Single Product ----------------------------------------------------- -->
  



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