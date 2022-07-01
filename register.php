<?php require_once('connection.php');
session_start();
?>
<?php require_once('insert.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="register.css">
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
                <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> <i class="fa fa-user" aria-hidden="true"></i> </a>
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


    <div class="container">
        <h1 class="well">Register Here</h1>


        <?php if($error_msg != ""){?>
                    <h4 class="text-center" style="color: #ffffff; padding: 4px; background-color: #80880e; font-size: 18px; margin-bottom: 20px;" class="mb-0"><?php echo $error_msg; ?></h4>
                    <?php }?>
                    <br>


        <div class="col-lg-12 well">
        <div class="row">    
                    <form action="" method="post">
                        <div class="formregister">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>First Name</label>
                                    <input type="text" name="fname" placeholder="Enter First Name Here.." class="form-control">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" placeholder="Enter Last Name Here.." class="form-control">
                                </div>
                            </div>					
                            <div class="form-group topic">
                                <label>Address</label>
                            </div>	
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Street</label>
                                    <input type="text" name="street" placeholder="Enter Street Name Here.." class="form-control">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>City</label>
                                    <input type="text" name="city" placeholder="Enter City Name Here.." class="form-control">
                                </div>	
                                <div class="col-sm-4 form-group">
                                    <label>Postal Code</label>
                                    <input type="number" name="pcode" placeholder="Enter Postal Code Here.." class="form-control">
                                </div>		
                            </div>						
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone" placeholder="Enter Phone Number Here.." class="form-control" pattern="07[0-2,4-8]{1}[0-9]{7}" maxlength="10">
                        </div>		
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="Enter Email Address Here.." class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        </div>	
                        <div class="form-group topic">
                            <label>Enter Password</label>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter New Password.." class="form-control">
                        </div>
                        <button type="sumbit" name="submit" class="btn btn-lg btn-info">Register</button>					
                        </div>
                    </form> 
                    </div>
        </div>
        </div>



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