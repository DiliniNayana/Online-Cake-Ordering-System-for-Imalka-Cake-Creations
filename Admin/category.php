<?php require_once('connection.php');?>
<?php


if(isset($_POST['submit'])){

    if(!empty($_POST['cat'])){


        $cat = $_POST['cat'];

        $query = "insert into category(cat_name) values('$cat')";

        $run = mysqli_query($connection, $query) or die(mysqli_error());

        if($run){ 
            // echo '<script>alert("Submitted Successfully")</script>';
            $_SESSION['status'] = "Category";
            $_SESSION['status_text'] = "Submitted Successfully";
            $_SESSION['status_code'] = "success";
         }else{
            // echo '<script>alert("Error")</script>';
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Please Try Again";
            $_SESSION['status_code'] = "error";
        }

    }else{
        // echo '<script>alert("Enter Category Name")</script>';
        $_SESSION['status'] = "Field is Empty !";
        $_SESSION['status_text'] = "Please Check and Try Again";
        $_SESSION['status_code'] = "warning";
    }

}


?>