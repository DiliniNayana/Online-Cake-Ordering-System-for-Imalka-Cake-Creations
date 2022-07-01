<?php require_once('connection.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="dashboard.css">

    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <!-- Dashboard======================================-->
    <div class="container1">
        <nav class="navbar">
          <div class="nav_icon" onclick="toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </div>
         
          <div class="navbar__left">
            <a href="#"></a>
            <a href="#"></a>
            <a class="active_link" href="#"></a>
          </div>
          <div class="navbar__right">
            <a href="#">
              <i class="fa fa-bell" aria-hidden="true"></i>
            </a>
            <a href="change_pass.php">
              <i class="fas fa-user-alt" aria-hidden="true"></i>
            </a>
            <!-- <p>Imalka Perera</p> -->
          </div>
        </nav>
  
        <main>
          <div class="main__container">
            <!-- MAIN TITLE STARTS HERE -->
  
            <!-- MAIN TITLE ENDS HERE -->
  
            <!-- MAIN CARDS STARTS HERE -->
            
            <div class="main__cards">
              <div class="card">
                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                <div class="card_inner">
                  <p class="text-primary-p">Customers</p>
                  <?php
                
                            $query = "SELECT c_id FROM customer ORDER BY c_id";  
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);
                
                        ?>
                  <span class="font-bold text-title"><?php echo $row?></span>
                </div>
              </div>

              <div class="card">
                <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                <div class="card_inner">
                  <p class="text-primary-p">Products</p>
                  <?php
                
                            $query = "SELECT p_id FROM product ORDER BY p_id";  
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);
                
                        ?>
                  <span class="font-bold text-title"><?php echo $row?></span>
                </div>
              </div>
  
              <div class="card">
                <i
                  class="fa fa-shopping-bag fa-2x"
                  aria-hidden="true"
                ></i>
                <div class="card_inner">
                  <p class="text-primary-p">Customize orders</p>
                  <?php
                
                            $query = "SELECT cu_id FROM customize ORDER BY cu_id";  
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);
                
                        ?>
                  <span class="font-bold text-title"><?php echo $row?></span>
                </div>
              </div>
  
                <div class="card">
                <i
                  class="fas fa-shopping-basket fa-2x"
                  aria-hidden="true"
                ></i>
                <div class="card_inner">
                  <p class="text-primary-p">Orders</p>
                  <?php
                
                            $query = "SELECT o_id FROM orders ORDER BY o_id";  
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);
                
                        ?>
                  <span class="font-bold text-title"><?php echo $row?></span>
                </div>
              </div>
            </div>
            <!-- MAIN CARDS ENDS HERE -->
  
            <!-- CHARTS STARTS HERE -->
            <div class="charts">
              <div class="charts__right">
                <div class="charts_right_title">
                  <div>
                    <h1>Customer Feedbacks</h1>
                  </div>
                  <i class="fas fa-star" aria-hidden="true"></i>
                </div>
              <div class="charts_right_cards">
                <div class="card5">
                <?php
                
                $query = "SELECT f_type FROM feedback where f_type = 'excellent' or f_type = 'good'"; 
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
    
                 ?>
                  <h4 style="font-size: 16px;">Excellent & Good</h4>
                  <p style="font-size: 20px;"><?php echo $row?></p>
                </div>
                <div class="card6">
                <?php
                
                $query = "SELECT f_type FROM feedback where f_type = 'bad' or f_type = 'very bad'"; 
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
    
                 ?>
                  <h4 style="font-size: 16px;">Bad & Very Bad</h4>
                  <p style="font-size: 20px;"><?php echo $row?></p>
                </div>
               </div>
              </div>
  
              <div class="charts__right">
                <div class="charts_right_title">
                  <div>
                    <h1>Oredrs</h1>
                   
                  </div>
                  <i class="fas fa-shopping-basket fa-2x" aria-hidden="true"></i>
                </div>
  
                <div class="charts_right_cards">
                  <div class="card1">
                  <?php
                
                $query = "SELECT status FROM orders where status = 'pending'"; 
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
    
                 ?>
                    <h4 style="font-size: 16px;">Pending Orders</h4>
                    <p style="font-size: 20px;"><?php echo $row?></p>
                  </div>
  
                  <div class="card2">
                  <?php
                
                $query = "SELECT status FROM orders where status = 'confirmed'"; 
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
    
                 ?>
                    <h4 style="font-size: 16px;">Confirmed Orders</h4>
                    <p style="font-size: 20px;"><?php echo $row?></p>
                  </div>
                </div>
              </div>
            </div>
            <!-- CHARTS ENDS HERE -->
          
          
          </div>
        </main>
  
        <div id="sidebar">
          <div class="sidebar__title">
            <div class="sidebar__img">
              <img src="image/underline.svg" alt="">
            </div>
          </div>
  
          <div class="sidebar__menu">
            <div class="sidebar__link active_menu_link">
              <i class="fa fa-home"></i>
              <a href="dashborad.php">Dashboard</a>
            </div>
            <h2>EDIT TABLE</h2>
            <div class="sidebar__link">
              <i class="fas fa-birthday-cake" aria-hidden="true"></i>
              <a href="editproduct.php">Products</a>
            </div>
            <div class="sidebar__link">
              <i class="fas fa-th-large"></i>
              <a href="editcategory.php">Category</a>
            </div>
            <div class="sidebar__link">
              <i class="fas fa-file-image"></i>
              <a href="addgallery.php">Gallery</a>
            </div>
            <h2>OTHERS</h2>
            <div class="sidebar__link">
              <i class="fa fa-money-check-alt"></i>
              <a href="order.php">Orders</a>
            </div>
            <div class="sidebar__link">
              <i class="fas fa-hand-holding-heart"></i>
              <a href="customize_order.php">Customize Orders</a>
            </div>
            <div class="sidebar__link">
                    <i class="fas fa-user-check"></i>
                    <a href="customers.php">Customer</a>
                  </div>
            <div class="sidebar__link">
              <i class="fa fa-sign-out"></i>
              <a href="reports.php">Reports</a>
            </div>
            <div class="sidebar__link">
              <i class="fa fa-calendar-check-o"></i>
              <a href="feedback.php">Feedbacks</a>
              </div>

            <div class="sidebar__logout">
                 <i class="fa fa-power-off"></i>
                <a href="logout.php">Log out</a>
            </div>
          </div>
        </div>
      </div>
    <!-- Dashboard======================================-->
      
    <!-- Optional JavaScript -->
    <script src="dashborad.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>