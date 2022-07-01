<?php require_once('connection.php');

if(isset($_POST['delete'])){

$gid = $_POST['gid']; // get id through query string

$query = "DELETE FROM gallery WHERE g_id = '$gid'";
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