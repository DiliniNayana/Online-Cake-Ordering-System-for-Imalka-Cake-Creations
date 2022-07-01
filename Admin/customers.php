<?php require_once('connection.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="customers.css">

    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
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
  
            <div class="main__title">
              <div class="main__greeting">
                <h1>Register Customers</h1>
              </div>
            </div>

              <!-- Customer Details Table --------------------------------------------------------------------------------->
        <div class="input-group">
            <div class="form-outline">
              <input type="search" id="form1" class="form-control" placeholder="Enter Customer ID" />
            </div>
            <button type="button" class="btn btn-primary">
              <i class="fas fa-search"></i>
            </button>
          </div>


        <div class="table-responsive">

            <!--Table-->
            <table class="table">
          
              <!--Table head-->
              <thead style="background-color: #c55757; color: #ffffff;">
                <tr>
                  <th>Customer ID</th>
                  <th class="th-sm">First name</th>
                  <th class="th-sm">Last name</th>
                  <th class="th-sm">Email</th>
                  <th class="th-sm">Action</th>
                </tr>
              </thead>
              <?php 
                    	$query = "SELECT * FROM customer";
                      $result = mysqli_query($connection,$query);
                      
                      while($row = mysqli_fetch_array($result)){
                        ?>
              <!--Table head-->
          
              <!--Table body-->
              <tbody>
                <tr>
                  <th scope="row"><?php echo $row['c_id']; ?></th>
                  <td><?php echo $row['c_fname']; ?></td>
                  <td><?php echo $row['c_lname']; ?></td>
                  <td><?php echo $row['c_email']; ?></td>
                  <!-- Modal ---------------------------------------------------------------------------------------------->
            <div class="modal fade" id="basicModal<?php echo $row['c_id']; ?>">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <div class="modal-body">
                    <h6><span>Customer ID :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_id']; ?></h6>
                    <br>
                    <h6><span>Customer Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_fname']." ".$row['c_lname']; ?></h6>
                    <br>
                    <h6><span>Customer Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_email']; ?></h6>
                    <br>
                    <h6><span>Customer Telephone :&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_tele']; ?></h6>
                    <br>
                    <hr>
                    <br>
                    <h6><span>Customer Address :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_add_street']; ?></h6>
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['c_add_town']; ?></h6>
                      <br>
                    <h6><span>Postal Code :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_add_postal']; ?></h6>
                    <br>
                    </div>
                </div>
                </div>
            </div>
        <!-- End of Modal ---------------------------------------------------------------------------------------------->

                  <td><a class='btn-xs' href="#" data-toggle="modal" data-target="#basicModal<?php echo $row['c_id']; ?>"><i class="far fa-eye"></i></a></td>
                </tr>
              </tbody>
              <!--Table body-->
              <?php }?>
            </table>
            <!--Table-->
          
          </div>
        <!-- End of Customer Details Table --------------------------------------------------------------------------------->


        
    

    </main>

            <div id="sidebar">
                <div class="sidebar__title">
                  <div class="sidebar__img">
                    <img src="image/underline.svg" alt="">
                  </div>
                  <i
                    onclick="closeSidebar()"
                    class="fa fa-times"
                    id="sidebarIcon"
                    aria-hidden="true"
                  ></i>
                </div>
        
                <div class="sidebar__menu">
                  <div class="sidebar__link">
                    <i class="fa fa-home"></i>
                    <a href="dashborad.php">Dashboard</a>
                  </div>
                  <h2>EDIT TABLE</h2>
                  <div class="sidebar__link">
                    <i class="fas fa-birthday-cake" aria-hidden="true"></i>
                    <a href="editproduct.php">Product</a>
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
                    <a href="order.php">Order</a>
                  </div>
                  <div class="sidebar__link">
                    <i class="fas fa-hand-holding-heart"></i>
                    <a href="customize_order.php">Customize Orders</a>
                  </div>
                  <div class="sidebar__link active_menu_link">
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
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
      </html>
      <?php mysqli_close($connection);?>