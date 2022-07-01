<?php require_once('connection.php');?>
<?php require_once('editproduct_delete.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="editproduct.css">

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
            <div class="main_container">
              <div class="main__greeting">
                <h1>Product List</h1>
              </div>
              <br>
              <div>
                <a href="upload_g/upload_product.php" class="addproductbtn"><b>+</b> Add New Product</a>
                </div>
              <!-- <div class="input-group">
                <div class="form-outline">
                  <input type="search" id="form1" class="form-control" placeholder="Search here" />
                </div>
                <button type="button" class="btn btn-primary1">
                  <i class="fas fa-search"></i>
                </button>
              </div> -->

                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <table class="table table-bordered">
                          <thead style="background-color: #c55757; color: #ffffff;">
                            <tr>
                              <th scope="col">Product ID</th>
                              <th scope="col">Image</th>
                              <th scope="col">Product Name</th>
                              <th scope="col">Category</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>


                          <?php 
                    	$query = "SELECT * FROM item";
                      $query = "SELECT * FROM product inner join category on product.cat_id = category.cat_id";
                      $result = mysqli_query($connection,$query);
                      
                      while($row = mysqli_fetch_array($result)){
                        $filenames = explode(",", $row['image']);
                        ?>

                        <form action="" method="post">
                          <tbody>
                            <tr>
                              <th><?php echo $row['p_id']; ?></th>
                              <td><img class="itemimage" src="upload_g/server/uploads/<?php echo $filenames[0];?>" alt=""></td>
                              <td><?php echo $row['p_name']; ?></td>
                              <td><?php echo $row['cat_name']; ?></td>
                              <td>

                               <!-- Modal ---------------------------------------------------------------------------------------------->
 <div class="modal fade" id="basicModal<?php echo $row['p_id']; ?>">
                <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header" style="background-color: #c55757; color: #ffffff">Item Details
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <div class="modal-body">
                    <table>
                                    
                                        <tr>
                                          <td class="table-topic">Image</td>
                                          <td class="table-font"><img src="upload_g/server/uploads/<?php echo $filenames[0];?>" width="250px"></td>
                                      </tr>
                                      <tr>
                                           <td class="table-topic">Product Code</td>
                                           <td class="table-font"><?php echo $row['p_id']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Product Name</td>
                                           <td class="table-font"><?php echo $row['p_name']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Category Name</td>
                                           <td class="table-font"><?php echo $row['cat_name']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Price</td>
                                           <td class="table-font"><span>Rs. </span><?php echo $row['p_price']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Description</td>
                                           <td class="table-font"><?php echo $row['p_des']; ?></td>
                                       </tr>
                                   </table>
                    </div>
                </div>
                </div>
            </div>
        <!-- End of Modal ---------------------------------------------------------------------------------------------->

                         <form action="" method="post">
                                <a class='btn btn-succes' href="upload_g/upload_product_edit.php?p_id=<?php echo $row['p_id']; ?>"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-succes" href="#" data-toggle="modal" data-target="#basicModal<?php echo $row['p_id']; ?>"><i class="far fa-eye"></i></a>
                                <!-- <button type="button" class="btn btn-succes"><i class="fas fa-edit"></i></button> -->
                                <input type="hidden" name="pid" value="<?php echo $row['p_id']; ?>">
                                <button class="btn btn-dange" name="delete" onclick="return confirm('Are you sure to Remove your Product ?')"><i class="fas fa-trash"></i></button>
                              </td>
                              </form>
                            </tr>
                          </tbody>
                          </form>
                          <?php }?>
                        </table>
                      </div>
                    </div>
                </div>

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
              <div class="sidebar__link  active_menu_link">
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

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="editproduct.js">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php mysqli_close($connection);?>