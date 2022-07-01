<?php require_once('../connection.php');?>
<?php
session_start();  

if(isset($_POST['submit1'])){


    if(!empty($_POST['files']) || !empty($_POST['description'])){

        // $files = $_POST['files'];

        $des = $_POST['description'];

        $images = implode(", ", $_POST['uploaded_image_name']);



        $query = "insert into gallery(description, image) values('$des', '$images')";

        $run = mysqli_query($connection, $query) or die(mysqli_error());

        if($run){ 
            // echo "Submitted Successfully";
            $_SESSION['status'] = "Submitted Successfully !";
            $_SESSION['status_text'] = "";
            $_SESSION['status_code'] = "success";
            // header('Location: ../add_g.php');
            echo"<script>window.open('../add_g.php','_self')</script>";

         }else{
            echo "Error";
            $_SESSION['status'] = "Oops.. !";
            $_SESSION['status_text'] = "Something Went Wrong";
            $_SESSION['status_code'] = "error";
        }

    }else{
        // echo "All Fields Required";
        $_SESSION['status'] = "Some Fields Are Empty !";
        $_SESSION['status_text'] = "Please Check and Try Again";
        $_SESSION['status_code'] = "warning";
   }
}



if(isset($_POST['submit_product'])){


    if(!empty($_POST['files']) || !empty($_POST['name']) || !empty($_POST['code']) || !empty($POST['price']) || !empty($_POST['des']) ||
    !empty($_POST['cat'])){

        // $files = $_POST['files'];

        $name = $_POST['name'];
        $code = $_POST['code'];
        $price = $_POST['price'];
        // $wprice = $_POST['wprice'];
        // $fprice = $_POST['fprice'];
        $des = $_POST['des'];
        $cat = $_POST['cat'];
        $wf = $_POST['wf'];
       
        $images = implode(", ", $_POST['uploaded_image_name']);

        $query = "insert into product(cat_id, p_code, p_name, p_des, p_price, image, wf) values('$cat', '$code', '$name', '$des', '$price', '$images', '$wf')";
  
        $run = mysqli_query($connection, $query);

        if($run){ 
            echo '<script>alert("Submitted Successfully")</script>';
            echo"<script>window.open('../upload_product.php','_self')</script>";

         }else{
            // echo "Error";
            echo '<script>alert("Error")</script>';
        }
}
//     else{
//         echo "All Fields Required";
//     }
}




if(isset($_POST['update_product'])){


    $pid = $_POST['pid'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $des = $_POST['des'];
    $wf = $_POST['wf'];


        $query = "UPDATE product SET p_name='$name', p_code='$code', p_price='$price', p_des ='$des', wf ='$wf' WHERE p_id = '$pid'";
        $run = mysqli_query($connection, $query);

        if($run){
            echo '<script>alert("Successfully updated")</script>';
            echo"<script>window.open('../../editproduct.php','_self')</script>";
        }
        else{
            echo '<script>alert("Error")</script>';
            echo"<script>window.open('../../editproduct.php','_self')</script>";
        }
    
}




?>
