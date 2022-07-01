<?php require_once('connection.php');

if(isset($_POST['delete'])){

$cuid = $_POST['cuid']; // get id through query string

$query = "DELETE FROM customize WHERE cu_id = '$cuid'";
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