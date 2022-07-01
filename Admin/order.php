<?php require_once('connection.php');?>
<?php require_once('login.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="order.css">

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
                <h1>Orders</h1>
              </div>
            </div>
            <br>

            <!-- Order Details Table --------------------------------------------------------->
            <section>
        <div class="container" id="order">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="active-member">
                  <div class="table-responsive">
                    <table class="table table-xs mb-0">
                      <thead style="background-color: #c55757; color: #ffffff;">
                        <tr>
                          <th>Order No.</th>
                          <th>Customer</th>
                          <th>Order Date</th>
                          <th>Total Price</th>
                          <th>Method</th>
                          <th>Status</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php 

                            $query = "SELECT orders.*, customer.*, product.* FROM ((orders INNER JOIN customer ON orders.c_id = customer.c_id)
                            INNER JOIN product ON orders.p_id = product.p_id) ORDER BY orders.o_id DESC";
                            $result = mysqli_query($connection, $query);
  
                            while($row = mysqli_fetch_array($result)){
                              $filenames = explode(",", $row['image']);
                              ?>
                        <tr>
                          <td>
                          <div class="modal fade" id="myModal<?php echo $row['o_id'];?>">
                                <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    
                                  <div class="modal-header">
                                    <h5 style="font-weight: bold;"><?php echo $row['p_name'];?></h5>
                                   
                                  </div>
                                  <div class="modal-body">
                                   <table>
                                    <tr>
                                        <td colspan="2"><img src="upload_g/server/uploads/<?php echo $filenames[0];?>" width="150">
                                      
                                        </td>
                                    </tr>
                                        <tr>
                                          <td class="table-topic">Item-Code</td>
                                          <td class="table-font"><?php echo $row['p_code'];?></td>
                                      </tr>
                                       <tr>
                                           <td class="table-topic">Order No.</td>
                                           <td class="table-font"><?php echo $row['o_id'];?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Qty</td>
                                           <td class="table-font"><?php echo $row['qty'];?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Total</td>
                                           <td class="table-font">Rs. <?php echo $row['total'];?></td>
                                       </tr>
                                       
                                       <tr>
                                        <td class="table-topic">Date</td>
                                        <td class="table-font"><?php echo $row['date'];?></td>
                                       </tr>
                
                                       <tr>
                                           <td class="table-topic">Time</td>
                                           <td class="table-font"><?php echo $row['time'];?></td>
                                       </tr>

                                       <tr>
                                           <td class="table-topic">Order need date</td>
                                           <td class="table-font"><?php echo $row['ndate'];?></td>
                                       </tr>


                                 
                                      </div>
                                   </table>
                                  </div>
                                
                                </div>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#myModal<?php echo $row['o_id'];?>" class="btn-view"><?php echo $row['o_id'];?></a>
                         
                         
                            </div>
                           </td>
                          <td>
                          <div class="modal fade" id="myModal1<?php echo $row['c_id'];?>">
                                <div class="modal-dialog modal-l">
                                <div class="modal-content">
                                    
                                  <div class="modal-header">
                                    <h5 style="font-weight: bold;"><?php echo $row['c_fname']." ".$row['c_lname'];?></h5>
                                   
                                  </div>
                                  <div class="modal-body">
                                   <table>
                                    
                                        <tr>
                                          <td class="table-topic">Email</td>
                                          <td class="table-font"><?php echo $row['c_email'];?></td>
                                      </tr>
                                       <tr>
                                           <td class="table-topic">Address</td>
                                           <td class="table-font"><?php echo $row['c_add_street'].", ".$row['c_add_town'].", ".$row['c_add_postal']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Delivery Address</td>
                                           <td class="table-font"><?php echo $row['ship_street'].", ".$row['ship_city'].", ".$row['ship_postal']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Phone Number</td>
                                           <td class="table-font"><?php echo $row['c_tele'];?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Area</td>
                                           <td class="table-font"><?php echo $row['area'];?></td>
                                       </tr>
                                   </table>
                                  </div>
                                
                                </div>
                                </div>
                            </div>
                          <a class="btn-view" href="#"  data-toggle="modal" data-target="#myModal1<?php echo $row['c_id'];?>"><?php echo $row['c_fname']." ".$row['c_lname'];?></a>
                        </td>

                          <td><span><?php echo $row['date'];?></span></td>
                          <td><span>Rs:<?php echo $row['total'];?></span></td>
                          <td><span><?php echo $row['method'];?></span></td>


                  
                     
                          <td style="color: #A30D5F; font-weight: 500;"><?php echo $row['status'];?></td>

                          <td>
                            <form action="" method="post">
                              <input type="hidden" name="oid" value="<?php echo $row['o_id']; ?>">
                              <button class="btn-confirm" name="order_confirm"><i class="fas fa-check"></i></button>
                              <button class="btn-success" name="order_success"><i class="fas fa-thumbs-up"></i></button>
                              </form>
                          </td>
                        </tr>
                        <?php }?>
                        <!----------------->
  
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
      </section>




  
        <!-- Order Details Table ------------------------------------------------------->
    

    
        </div>
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
                  <div class="sidebar__link active_menu_link">
                    <i class="fa fa-money-check-alt"></i>
                    <a href="order.php">Order</a>
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