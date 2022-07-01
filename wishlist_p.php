<?php

if(isset($_POST['submit_to_wishlist'])){

    if(!isset($_SESSION['cid'])){
        // echo "Please Login to Add items into the wishlist";
        $_SESSION['status'] = "You're not logged in";
        $_SESSION['status_text'] = "Please Login to Add items into the wishlist";
        $_SESSION['status_code'] = "info";
    }else{

        $cid =  $_SESSION['cid'];
        $pid = $_POST['pid'];
        // $total = $_POST['total'];

        $query2 = "SELECT * FROM wishlist WHERE p_id ='$pid' AND c_id = '$cid' ";
	    $result2 = mysqli_query($connection,$query2);

        if(mysqli_num_rows($result2) > 0){
            // echo "Already Added this Item.";
            $_SESSION['status'] = "Product Already Added to The Wishlist";
            $_SESSION['status_text'] = "";
            $_SESSION['status_code'] = "warning";
        }else{

            $query = "insert into wishlist(p_id, c_id) values('$pid', '$cid')";

            $run = mysqli_query($connection, $query);
    
            if($run){ 
                //  echo "Successfully Added to the wishlist";
                $_SESSION['status'] = "Product Successfully Added to the wishlist";
                $_SESSION['status_text'] = "";
                $_SESSION['status_code'] = "success";
             }else{
                // echo "Error";
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = "";
                $_SESSION['status_code'] = "error";
            }

        }

    }
}

?>