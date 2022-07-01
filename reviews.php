<?php require_once('connection.php');?>
<?php
session_start();

if(isset($_POST['submit'])){

    if(isset($_SESSION['cid'])){

    $cus_id = $_SESSION['cid'];
    

    if(!empty($_POST['f_type']) || !empty($_POST['f_des'])){

        $cid = $cus_id;
        $comment = $_POST['f_des'];
        $type = $_POST['f_type'];
        $dt1=date("Y-m-d");
        $dt2=date("H:i:s");

        $query = "insert into feedback(c_id, f_type, f_des, date, time) values('$cid', '$type', '$comment', '$dt1', '$dt2')";
        
        $run = mysqli_query($connection, $query) or die(mysqli_error());


        if($run){ 
            //  echo "Submitted Successfully";
            $_SESSION['status'] = "Thank You for Your Review";
            $_SESSION['status_text'] = "";
            $_SESSION['status_code'] = "success";
         }else{
            // echo "Error";
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Please Try Again";
            $_SESSION['status_code'] = "error";
        }
    }
    else{
        // echo "All Fields Required";
        $_SESSION['status'] = "Some Fields are Empty";
        $_SESSION['status_text'] = "Please Check and Try Again";
        $_SESSION['status_code'] = "warning";
    }
    
    }else{
        // echo "Please Login";
        $_SESSION['status'] = "Please Login";
        $_SESSION['status_text'] = "Try Again";
        $_SESSION['status_code'] = "info";
    }
}

?>