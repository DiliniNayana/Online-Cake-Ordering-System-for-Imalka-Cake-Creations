<?php require_once('connection.php');
session_start();
?>
<?php require_once('category.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="editcategory.css">

    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
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
                <h1>Add new category</h1>
              </div>
              <br>
              <div>

              <!-- Add Category --------------------------------------------------------------------------------->
              <form action="" method="post">

            <div class="form-group">
                <label for="inputcategory" class="subtopic">Enter new category name</label>
                <div class="row">
                <input type="text" name="cat" style=" border: 1px solid #c45555; width: 50%;" class="form-control">
                </div>
            </div>
            <button class="btn btn-primary-1" type="submit" name="submit">ADD</button>
            <br>
            <br>
            <br>
            <br>

            <div class="form-group">
                <label class="subtopic">Categories</label>
                <div class="row">
                <?php 
                    	$query = "SELECT * FROM category";
                      $result = mysqli_query($connection,$query); ?>

                      <textarea name="des" id="cat" cols="30" rows="6" style="width:50%; border: 1px solid #c45555;">
                      <?php while($row = mysqli_fetch_array($result)){ 
                      echo $row['cat_name']; ?>
                    
                      <?php }?>
                      </textarea>
                      </div>
                      </div>
          </form> 
            
          </main>
          <!-- End of Add Category --------------------------------------------------------------------------------->

        
        


        <div id="sidebar">
            <div class="sidebar__title">
              <div class="sidebar__img">
                <img src="image/underline.svg" alt="">
              </div>
            </div>
    
            <div class="sidebar__menu">
              <div class="sidebar__link">
                <i class="fa fa-home"></i>
                <a href="dashborad.php">Dashboard</a>
              </div>
              <h2>EDIT TABLE</h2>
              <div class="sidebar__link">
                <i class="fas fa-birthday-cake" aria-hidden="true"></i>
                <a href="editproduct.php">Products</a>
              </div>
              <div class="sidebar__link active_menu_link">
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