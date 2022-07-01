<?php require_once('../connection.php');?>
<?php
session_start();

if(isset($_POST['submit'])){

    if(isset($_SESSION['cid'])){

        $cus_id = $_SESSION['cid'];


    if(!empty($_POST['description']) || !empty($_POST['odate'])){

        // $files = $_POST['files'];

        $cid = $cus_id;
        $des = $_POST['description'];
        $ndate = $_POST['odate'];
        $dt1=date("Y-m-d");
        $dt2=date("H:i:s");

        $images = implode(", ", $_POST['uploaded_image_name']);



        $query = "insert into customize(c_id, description, image, n_date, date, time) values('$cid', '$des', '$images', '$ndate', '$dt1', '$dt2')";

        $run = mysqli_query($connection, $query) or die(mysqli_error());

        if($run){ 
            // echo '<script>alert("submited success")</script>';
            //  echo"<script>window.open('../customize.php','_self')</script>";
            $_SESSION['status'] = "Thank You !";
            $_SESSION['status_text'] = "Your submission is received and we will contact you soon.";
            $_SESSION['status_code'] = "success";
            header('Location: ../customize.php');

         }else{
            // echo '<script>alert("Error")</script>';
            // echo"<script>window.open('../customize.php','_self')</script>";
            $_SESSION['status'] = "Oops.. !";
            $_SESSION['status_text'] = "Something Went Wrong";
            $_SESSION['status_code'] = "error";
            header('Location: ../customize.php');
        }

    }else{
        // echo '<script>alert("All Fields Required")</script>';
        // echo"<script>window.open('../customize.php','_self')</script>";
        $_SESSION['status'] = "Some Fields Are Empty !";
        $_SESSION['status_text'] = "Please Check and Try Again";
        $_SESSION['status_code'] = "warning";
        header('Location: ../customize.php');
   }
   
    }else{
        // echo '<script>alert("Please Login")</script>';
        // echo"<script>window.open('../customize.php','_self')</script>";
        $_SESSION['status'] = "You're not logged in !";
        $_SESSION['status_text'] = "Please Try Again";
        $_SESSION['status_code'] = "info";
        header('Location: ../customize.php');
    }
}


?>
<?php mysqli_close($connection);?>