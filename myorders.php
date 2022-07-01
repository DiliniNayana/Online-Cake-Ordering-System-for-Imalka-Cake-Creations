<?php require_once('connection.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="myorders.css">
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


          <section class="mt-5">
        <div class="container">

        <div class="login-popup-wrap new_login_popup">
      <div class="login-popup-heading text-left">
          <h3 class="topic text-center"> My Orders</h3>
                    <br>
                    <br>

            <div class="cart">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead" style="background-color: #c23582;">
                        <tr>
                            <th scope="col"class="text-white">Product</th>
                            <th scope="col"class="text-white">Price</th>
                            <th scope="col"class="text-white">Quantity</th>
                            <th scope="col"class="text-white">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $subtotal = 0;
                    $total = 0;

                      if(isset($_SESSION['cid'])){

                      $cid = $_SESSION['cid'];

                      $query = "SELECT * FROM orders WHERE c_id = '$cid' AND status != 'success' ";
                      $result = mysqli_query($connection,$query);

                      if(mysqli_num_rows($result) > 0){

                      while($row = mysqli_fetch_array($result)){

                        $products = explode("," , $row['p_id']);
                        $qtys = explode("," , $row['qty']);

                        for($i = 0;$i<count($products);$i++){
                        
                            $query2 = "SELECT * FROM product WHERE p_id = '$products[$i]' ";
                            $result2 = mysqli_query($connection,$query2);

                            $row2 = mysqli_fetch_assoc($result2);

                            $filenames = explode(",", $row2['image']);
                    ?>
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                                        <img src="Admin/upload_g/server/uploads/<?php echo $filenames[0];?>" width="100px">
                                    </div>
                                    <div class="des">
                                        <p><?php echo $row2['p_name']; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6><?php echo $row2['p_price']; ?></h6>
                            </td>
                            <td>
                            <h6><?php echo $qtys[$i]; ?></h6>
                            </td>
                            <td>
                                <h6>Rs:<?php echo ($row2['p_price'] * $qtys[$i]); ?></h6>
                                <?php $subtotal = $subtotal + ($row2['p_price'] * $qtys[$i]); ?>
                                <?php $total = $total + ($row2['p_price'] * $qtys[$i]); ?>
                            </td>
                        </tr>
                        <?php }}}else{ ?>
                        <tr>
                            <td colspan="4" class="text-center"><h3>- - - NO ORDERS - - -</h3></td>
                        </tr>
                  <?php  }
                } else{ ?>
                         <tr>
                            <td colspan="4" class="text-center"><h3>- - - PLEASE LOGIN - - -</h3></td>
                        </tr>
                     
                  <?php  } ?>
                        <!----->
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>
    <div class="col-lg-4 offset-lg-4">
        <div class="checkout">
      
        <?php 
        $query = "SELECT * FROM orders WHERE c_id = '$cid' ORDER BY o_id DESC";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        ?>

        <p style="color:#A30D5F; font-size:18px" class="text-center"> <b> <u>- - - Order Status - - -</u></b> </p>
        <?php if($row['status'] == "pending") {?>
        <p style="color:#167012; font-size:17px" class="text-center"> <b>- - pending - -</b> </p>
        <?php }else if($row['status'] == "confirmed"){?>
        <p style="color:#167012; font-size:17px" class="text-center"> <b>- - confirmed & on process - -</b> </p>
        
            <ul style="color:#167012; font-weight: 500;">
                <li class="subtotal">SubTotal
                    <span> - Rs: <?php echo $subtotal; ?></span>
                </li>
                <li class="cart-total">Total
                <span> - Rs: <?php echo $total; ?></span></li>
            </ul>
            <?php }}?>
            <br>
            <br>
        </div>
    </div>



      </div>
    </div>

    <!-- Optional JavaScript -->
    <?php include("floatingbtn.php");?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php mysqli_close($connection);?>