<?php require_once('connection.php');

if(isset($_POST['delete'])){

$pid = $_POST['pid']; // get id through query string

$query = "DELETE FROM product WHERE p_id = '$pid'";
$run = mysqli_query($connection, $query);

    if($run){ 
        // echo "Deleted Successfully";
        echo '<script>alert("Deleted Successfully")</script>';

        

    }else{
        // echo "Error";
        echo '<script>alert("Error")</script>';
    }
}
?>