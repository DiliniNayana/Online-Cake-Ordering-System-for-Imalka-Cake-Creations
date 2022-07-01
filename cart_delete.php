<?php require_once('connection.php');

if(isset($_POST['delete'])){

$cartid = $_POST['cartid']; // get id through query string

$query = "DELETE FROM cart WHERE cart_id = '$cartid'";
$run = mysqli_query($connection, $query);

    if($run){ 
        // echo "Deleted Successfully";
        echo '<script>alert("Deleted Successfully")</script>';
        // $_SESSION['status'] = "Are you sure?";
        // $_SESSION['status_text'] = "Once deleted, you will not be able to recover this imaginary file!";
        // $_SESSION['status_code'] = "warning";
        // header('Location: cart.php');

        

    }else{
        // echo "Error";
        echo '<script>alert("Error")</script>';
        // $_SESSION['status'] = "Are you sure?";
        // $_SESSION['status_text'] = "Once deleted, you will not be able to recover this imaginary file!";
        // $_SESSION['status_code'] = "warning";
    }
}
?>