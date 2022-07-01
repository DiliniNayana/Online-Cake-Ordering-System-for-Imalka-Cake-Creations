<?php


if(isset($_POST['submit'])){

    if(isset($_SESSION['cid'])){

        $cid = $_SESSION['cid'];
       
        $pid = implode(", ", $_POST['pid']);
        $qty = implode(", ", $_POST['qty']);
        $total =  $_POST['amount'];
        $ship =  $_POST['ship'];
        $area =  $_POST['area'];
        $ndate =  $_POST['ndate'];
       
        $dt1=date("Y-m-d");
        $dt2=date("H:i:s");

        if(!empty($_POST['addstreet'])){
            
            $addstreet = $_POST['addstreet'];
            $addcity = $_POST['addcity'];
            $addpostal = $_POST['addpostal'];

            $queryupdate = "UPDATE customer SET ship_street = '$addstreet', ship_city='$addcity', ship_postal ='$addpostal' WHERE c_id = $cid";
            $runupdate = mysqli_query($connection, $queryupdate) or die(mysqli_error());
        }

        $query = "insert into orders(p_id, c_id, date, time, qty, total, status, method, area, ndate) values('$pid','$cid', '$dt1', '$dt2', '$qty', '$total', 'pending', '$ship', '$area', '$ndate')";
        $run = mysqli_query($connection, $query) or die(mysqli_error());
     

        $query2 = "DELETE FROM cart WHERE c_id = '$cid' ";
        $run2 = mysqli_query($connection, $query2) or die(mysqli_error());


        if($run && $run2){ 
            // echo "Your order is confirmed";
            $_SESSION['status'] = "Your order is confirmed";
            $_SESSION['status_text'] = "You’ll receive a confirmation email with your order number shortly.";
            $_SESSION['status_code'] = "success";
        }else{
        //    echo "Error";
        $_SESSION['status'] = "Oops.. !";
        $_SESSION['status_text'] = "Something Went Wrong";
        $_SESSION['status_code'] = "error";
       }

    }
}

?>