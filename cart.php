<?php require_once('connection.php');
session_start();
?>
<?php require_once('insert.php');?>
<?php require_once('cart_delete.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="cart.css">
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
            
            </li>
	          <li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
			  <li class="nav-item"><a href="index.php#aboutid" class="nav-link">About</a></li>
              <li class="nav-item"><a href="index.php#footerid" class="nav-link">Contact</a></li>
			    <li class=" d-none d-xl-block">				
				  <li class="nav-item"><a href="wishlist.php"class="nav-link">
				<i class="fas fa-heart"></i></a></li>		
			    </li>
	    	 <li class="nav-item"><a href="cart.php" class="nav-link active">
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

    <!-- Cart======================================================================= -->
    <div class="cart_section">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-10 offset-lg-1">
                  <div class="cart_container">
                      <div class="cart_title">Shopping Cart</div>
                      <div class="cart_items">
                          <ul class="cart_list">


                          <?php 
                            $subtotal = 0;
                            $total = 0;

                            if(isset($_SESSION['cid'])){

                            $cid = $_SESSION['cid'];

                            $query = "SELECT * FROM cart inner join product on cart.p_id = product.p_id WHERE c_id = $cid ";
                            $result = mysqli_query($connection,$query);

                            if(mysqli_num_rows($result) > 0){

                            while($row = mysqli_fetch_array($result)){

                                $filenames = explode(",", $row['image']);
                            ?>


                              <li class="cart_item clearfix">
                                  <div class="cart_item_image"><img src="Admin/upload_g/server/uploads/<?php echo $filenames[0];?>"></div>
                                  <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                      <div class="cart_item_name cart_info_col">
                                          <div class="cart_item_title">Name</div>
                                          <div class="cart_item_text"><?php echo $row['p_name']?></div>
                                          <!-- <p class="flavour">Chicken</p> -->
                                      </div>


                                      <div class="cart_item_color cart_info_col">
                                          <div class="cart_item_title">Weight</div>
                                          <!-- <div class="select-c-q">
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="" selected="">Weight</option>
                                                        <option value="400">400g</option>
                                                        <option value="1">1kg</option>
                                                        <option value="2">2kg</option>
                                                        <option value="3">3kg</option>
                                                </select>
                                            </div>
                                        </div> -->
                                      </div>

                                      <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="counter">
                                                <form action="" method="post">
                                                    <input type="hidden" name="proid" value="<?php echo $row['p_id']; ?>">
                                                    <input type="hidden" name="cusid" value="<?php echo $cid; ?>">
                                                    <input class="input-number" type="number" name="qty" value="<?php echo $row['qty']; ?>"min="0"max="10">
                                                    <button name="updateqty" class="qty-update-btn"><i class="fas fa-sync-alt"></i></button>
                                                </form>
                                            </div>
                                        </div>
  
                                      <div class="cart_item_price cart_info_col">
                                          <div class="cart_item_title">Price</div>
                                          <div class="cart_item_text">Rs. <?php echo ($row['p_price'] * $row['qty']); ?>

                                            <?php $subtotal = $subtotal + ($row['p_price'] * $row['qty']); ?>
                                            <?php $total = $total + ($row['p_price'] * $row['qty']); ?>
                                          </div>
                                      </div>


                                      <form action="" method="post">
                                      <!-- <div class="btn" data-bs-dismiss="alert"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </div> -->
                                      <input type="hidden" name="cartid" value="<?php echo $row['cart_id']; ?>">
                                      <button class="btn btn-sm btn-danger" name="delete" onclick="return confirm('Are you sure to Remove your Product ?')"><i class="fas fa-trash"></i></button>
                                      </form>


                                      <?php }}else{ ?>

                                        <div class="text-center"><i class="fas fa-cart-arrow-down" style="font-size: 160px; color: #acacac; margin-top: 20px;"></i></div>
                                                        <tr>
                                                            <td colspan="4"><h3 class="text-center" style="font-size: 60px; margin-top: 20px;">Your cart is currently empty.</h3></td>
                                                        </tr>
                                                <?php  }
                                                } else{ ?>
                                                        <tr>
                                                            <td colspan="4"><h3 class="text-center" style="font-size: 40px; margin-top: 20px;">Please Login to View Your Cart.</h3></td>
                                                        </tr>
      
                                    
                                    <!-- <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text"><?php echo $subtotal; ?></div>
                                        </div> -->
                                </div>
                                </li>
                              <?php  } ?>
                          </ul>
                          </div>
                          
                          
                      <div class="order_total">
                          <div class="order_total_content text-md-right">
                              <div class="order_total_title">Order Total:</div>
                              <div class="order_total_amount">Rs. <?php echo $total; ?></div>
                          </div>
                      </div>
                      <div class="cart_buttons"> 
                        <!-- <a href="cake.php">
                          <button type="button" class="button cart_button_shop">Continue Shopping</button> 
                        </a> -->
                        <a href="place_order.php">
                          <button type="submit" class="button cart_button_order">Place Order</button> 
                        </a>  
                        </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <!-- End of Cart======================================================================= -->

    <?php include("floatingbtn.php");?>
    <!-- Optional JavaScript -->
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
