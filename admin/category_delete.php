<?php
include('connection/db.php');

$del = intval($_GET['del']);

$query = mysqli_query($conn, "DELETE FROM job_category WHERE id='$del'");

if($query){
    echo "<script>alert('Record has been deleted successfully')</script>";
    header('location:category.php');
}else{
    echo "<script>alert('Error deleting record')</script>";
}
?>