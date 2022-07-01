<?php require_once('connection.php');
session_start();
?>
<?php

      if(isset($_POST['submit'])){
        $email          = $_POST['email'];
        $subject        = $_POST['subject'];
        $message        = $_POST['message'];

        $to                   ="{$email}";
        $mail_subject         ="Imalka Cake Creations - Customize Order";
        $email_body           ="{$subject} \r\n \r\n";
        $email_body           .="{$message } \r\n \r\n \r\n \r\n";
        $email_body           .="Contact Us \r\n \r\n";
        $email_body           .="Imalka Cake Creations \r\n";
        $email_body           .="160/29C,Kirimatiyagara Kadawatha, Sri Lanka \r\n";
        $email_body           .="+94 775970007 \r\n";
        $email_body           .="https://www.facebook.com/Imalka-Cake-Creations-346336505698770 ";


        // $email_body           .="<script><b>Message : </b></script>" .nl2br(strip_tags($message));
        $headers = "From: imalkacakecreations@gmail.com\r\nReply-To: imalkacakecreations@gmail.com";

        $send_mail_result = mail($to, $mail_subject, $email_body, $headers);

        if($send_mail_result){
          // echo "Message sent";
          $_SESSION['status'] = "Message sent";
          $_SESSION['status_code'] = "success";
        }else{
          // echo "Message not sent";
          $_SESSION['status'] = "Message not sent";
          $_SESSION['status_code'] = "error";
        }
      }

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Imalka Cake Creations</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="c_order_d.css">

    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

        <main>
          <div class="container">
            <!-- MAIN TITLE STARTS HERE -->
            <br>
  
            <a href="customize_order.php" class="c_back">Back</a>
            <div class="main__title">
              <div class="main__greeting">
                <h1>Customize Order Details</h1>
              </div>
            </div>
            <hr>
            <br>

<!--Table-->
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  
                </tr>
              </thead>
              <?php 
                      $catid= $_GET['mcategory'];
                      $query = "SELECT * FROM customize inner join customer on customize.c_id = customer.c_id where cu_id='$catid'";
                      $result = mysqli_query($connection,$query);
                      
                      while($row = mysqli_fetch_array($result)){
                        $filenames = explode(",", $row['image']);
                        ?>
              <tbody>
                <tr>
                  <th>Order ID</th>
                  <td><?php echo $row['cu_id']; ?></td>
                </tr>
                <tr>
                  <th>Customer Name</th>
                  <td><?php echo $row['c_fname']." ".$row['c_lname']; ?></td>
                </tr>
                <tr>
                  <th>Customer Telephone</th>
                  <td><?php echo $row['c_tele']; ?></td>
                </tr>
                <tr>
                  <th>Customer Email</th>
                  <td><?php echo $row['c_email']; ?></td>
                </tr>
                <tr>
                  <th>Customer Address</th>
                  <td><?php echo $row['c_add_street'].", ".$row['c_add_town']." | ".$row['c_add_postal']; ?></td>
                </tr>
                <tr>
                  <th>Ordered Date</th>
                  <td><?php echo $row['date']; ?></td>
                </tr>
                <tr>
                  <th>Ordered Time</th>
                  <td><?php echo $row['time']; ?></td>
                </tr>
                <tr>
                  <th>Order Need Date</th>
                  <td><?php echo $row['n_date']; ?></td>
                </tr>
                <tr>
                  <th>Order Description</th>
                  <td><?php echo $row['description']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>

          <br>
          <div class=c_image>
                <img src="../upload_c/server/uploads/<?php echo $filenames[0];?>" alt="" width="300px">
            </div>
            
            <br>
            <br>
<hr>


        <div class="mailform">
            <div class="subtopic">
                <h3>Send email to customer</h3>
            </div>
            <br>

            <form action="" method="post">
              <p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $row['c_email']; ?>" required>
              </p>
              <p>
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" required>
              </p>
              <p>
                <label for="message">Message</label>
                <textarea type="message" name="message" id="message" cols="15" rows="10" required></textarea>
              </p>
              <p>
                <button type="submit" name="submit">Send message</button>
              </p>
            </form>

            </div>
            <br>
            <br>
            <br>
            <br>
            <?php }?>
          </div>
          
        </main>
    
 
      

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