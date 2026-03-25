<?php
include('connection/db.php');

$del = intval($_GET['del']);

$query = mysqli_query($conn, "DELETE FROM admin_login WHERE id=$del");

if($query){
    echo "<script>alert('Record has been deleted successfully')</script>";
    header('location:Customers.php');
}else{
    echo "<script>alert('Error deleting record')</script>";
}
?>