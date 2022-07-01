<?php require_once('connection.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="reports.css">

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
                <h1>Sales Report</h1>
              </div>
            </div>

    




            <section style="margin-top:30px;">
      <div  class=" col-md-6">
                  <form action="" method="post">
                  <label for="from" style="font-weight:bold; font-size:16px;">From:</label>
                  <input type="date" id="from" name="from">&nbsp;&nbsp;&nbsp;&nbsp;
                  <label for="to" style="font-weight:bold; font-size:16px;">To:</label>
                  <input type="date" id="to" name="to">
                  <input type="submit" name="orders_fromto" value="Search" class="searchbtn"> 
                </form>
                </div>
                </section>



      <section class="mt-5">
        <div class="container">
            <div class="cart" style="background: white;">
            <div class="table-responsive">
                <table class="table  mb-2 export-table">
                    <thead style="background: #c55757;">
                        <tr class="logo-row">
                          <th style="background-color: white;" class="table-logo d-none">
                          <img src="image/underline.svg" width="200px" class="ml-3 my-3">
                          </th>
                         
                        </tr>
                        <tr>
                          <th scope="col"class="text-white">Order No</th>
                            <th scope="col"class="text-white">Product Name</th>
                            <th scope="col"class="text-white">Price</th>
                            <th scope="col"class="text-white">Quantity</th>
                            <th scope="col"class="text-white">Total</th>
                            <th scope="col"class="text-white">Date</th>
                            <th scope="col"class="text-white">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                        $total = 0;
                        if(isset($_POST['orders_fromto'])){
                          
                          $from = date("Y-m-d", strtotime($_POST['from']));
                          $to = date("Y-m-d", strtotime($_POST['to']));
                          $query = "SELECT * FROM orders WHERE date BETWEEN '$from' AND '$to' ";

                        }else{
                          $query = "SELECT * FROM orders";
                        }
                       
                        $result = mysqli_query($connection,$query);
  
                        if(mysqli_num_rows($result) > 0){
  
                        while($row = mysqli_fetch_array($result)){
  
                          $products = explode("," , $row['p_id']);
                          $qtys = explode("," , $row['qty']);
  
                          for($i = 0;$i<count($products);$i++){
                          
                              $query2 = "SELECT * FROM product WHERE p_id = '$products[$i]' ";
                              $result2 = mysqli_query($connection,$query2);
  
                              $row2 = mysqli_fetch_assoc($result2);

                              $total = $total + ($row2['p_price'] * $qtys[$i]);

                        ?>
                      
                        <tr>
                        <td>
                            <?php echo $row['o_id']; ?>
                        </td>
                        <td>
                            <span><?php echo $row2['p_name']; ?></span>
                        </td>
                        <td>
                         <span><?php echo $row2['p_price']; ?></span>
                        </td>
                        <td>
                         <span><?php echo $qtys[$i]; ?></span>
                        </td>
                        <td>
                         <span><?php echo ($row2['p_price'] * $qtys[$i]); ?></span>
                        </td>
                        <td>
                         <span><?php echo $row['date']; ?></span>
                        </td>
                        <td>
                         <span><?php echo $row['time']; ?></span>
                        </td>
                        </tr>
                        <?php }}}?>
                        <!----------------->
                       
                      </tbody>

                      <td>
                       <label for="" style="color:#c55757; font-weight:bold; font-size:16px;">Income: &nbsp;&nbsp;</label>
                         <span style="font-weight:bold; font-size:19px;">Rs:<?php echo $total; ?></span>
                        </td>

                </table>
            </div>
            </div>
        </div>

    </section>
   <button class="printbtn">Print</button>

   <br>
   <br>






    

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
                  <div class="sidebar__link active_menu_link">
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
        
        
          <script>
    $( document ).ready(function() {
    $('.printbtn').on('click', function () {
        $(".table-logo").removeClass('d-none');
        var card = $('.export-table').clone();
        $('body').html('');
        $('body').append(card);
        window.print();
    });

    window.onafterprint = function(){
    window.location.reload(true);
    }
  });
    </script>
        
        
        </body>
      </html>
      <?php mysqli_close($connection);?>