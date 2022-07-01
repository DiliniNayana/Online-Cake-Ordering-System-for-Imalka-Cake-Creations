<?php require_once('connection.php');

if(isset($_POST['delete'])){

$wid = $_POST['wid']; // get id through query string

$query = "DELETE FROM wishlist WHERE w_id = '$wid'";
$run = mysqli_query($connection, $query);

    if($run){ 
        // echo "Deleted Successfully";
        echo '<script>alert("Deleted Successfully")</script>';
        // $_SESSION['status'] = "Product Remove Successfully";
        // $_SESSION['status_text'] = "";
        // $_SESSION['status_code'] = "success";

        

    }else{
        // echo "Error";
        echo '<script>alert("Error")</script>';
        // $_SESSION['status'] = "Oops.. !";
        // $_SESSION['status_text'] = "Something Went Wrong";
        // $_SESSION['status_code'] = "error";
    }
}
?>