<?php require_once('connection.php');?>
<?php require_once('addgallery_delete.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="addgallery.css">

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
                <h1>Gallery</h1>
              </div>
            </div>
            <br>
            <a href="upload_g/add_g.php" class="addgallery"><b>+</b> Add new image</a>

            <br>
            <br>
          <!--Table-->
          <div class="table-responsive">
         
            <table class="table table-striped">
              <thead style="background-color: #c55757; color: #ffffff;">
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php 
                    	$query = "SELECT * FROM gallery";
                      $result = mysqli_query($connection,$query);
                      
                      while($row = mysqli_fetch_array($result)){
                        $filenames = explode(",", $row['image']);
                        ?>
                        <form action="" method="post">
              <tbody>
                <tr>
                  <td><?php echo $row['g_id']; ?></td>
                  <td><img class="pic-1" src="upload_g/server/uploads/<?php echo $filenames[0];?>" width="40px"></td>
                  <td><?php echo $row['description']; ?></td>
                  <input type="hidden" name="gid" value="<?php echo $row['g_id']; ?>">
                  <td><button class="btn-delete" name="delete" onclick="return confirm('Are you sure to Remove your Product ?')"><i class="fas fa-trash"></i></button></td>
                </tr>
                <?php }?>
              </tbody>
              </form>
            </table>
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
                  <div class="sidebar__link">
                    <i class="fas fa-birthday-cake" aria-hidden="true"></i>
                    <a href="editproduct.php">Product</a>
                  </div>
                  <div class="sidebar__link">
                    <i class="fas fa-th-large"></i>
                    <a href="editcategory.php">Category</a>
                  </div>
                  <div class="sidebar__link active_menu_link">
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
          <!-- Dashboard======================================-->
      
    

          <!-- Optional JavaScript -->

          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
      </html>