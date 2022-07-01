<?php require_once('connection.php');?>
<?php 

    if(isset($_POST['login'])){

        $email=$_POST['email'];
        $password=$_POST['password'];

        $query="select * from login where c_email='$email'and password = '$password' and category ='admin'";
        $result=mysqli_query($connection,$query);

        if(mysqli_num_rows($result)>0){
               
         $_SESSION['c_email'] = $email;

            echo"<script> window.open('dashborad.php', '_self') </script>";
        }else{
            // echo '<script>alert("Login Error")</script>';
            $_SESSION['status'] = "Login Error";
            $_SESSION['status_text'] = "Something Went Wrong";
            $_SESSION['status_code'] = "error";
        }
    }

    if(isset($_POST['update'])){

        $email =  $_SESSION['c_email'];
    
        $opass = $_POST['current'];
        $npass = $_POST['npass'];
        $cpass = $_POST['cpass'];
    
        if($npass == $cpass){
    
        $query = "UPDATE login SET  password='$npass'  WHERE c_email = '$email'";
        $run = mysqli_query($connection, $query) or die(mysqli_error());
        
        if($run){ 
            // echo '<script>alert("Updated Successfully")</script>';
            $_SESSION['status'] = "Password Updated Successfully !";
            $_SESSION['status_text'] = "";
            $_SESSION['status_code'] = "success";
        }else{
        //    echo '<script>alert("Error")</script>';
        $_SESSION['status'] = "Oops.. !";
        $_SESSION['status_text'] = "Something Went Wrong";
        $_SESSION['status_code'] = "error";
       }
    }
}




if(isset($_POST['order_confirm'])){

    $oid = $_POST['oid'];

    $query = "UPDATE orders SET  status ='confirmed' where o_id= '$oid'";
    $run = mysqli_query($connection, $query) or die(mysqli_error());
    
    if($run){ 
        // echo "updated Successfully";
        $_SESSION['status'] = "Updated Successfully";
        $_SESSION['status_text'] = " Order Confirmed";
        $_SESSION['status_code'] = "success";
    }else{
       //    echo "Error";
       $_SESSION['status'] = "Error";
       $_SESSION['status_text'] = "";
       $_SESSION['status_code'] = "error";
   }

}

if(isset($_POST['order_success'])){

    $oid = $_POST['oid'];

    $query = "UPDATE orders SET status ='success' where o_id= '$oid'";
    $run = mysqli_query($connection, $query) or die(mysqli_error());
    
    if($run){ 
        // echo "updated Successfully";
        $_SESSION['status'] = "Updated Successfully";
        $_SESSION['status_text'] = " Order Success";
        $_SESSION['status_code'] = "success";
    }else{
    //    echo "Error";
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = "";
                $_SESSION['status_code'] = "error";
   }

}
?>
