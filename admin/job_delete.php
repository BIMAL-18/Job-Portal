<?php
include('connection/db.php');

$del = intval($_GET['del']);

$query = mysqli_query($conn, "DELETE FROM all_jobs WHERE job_id=$del");

if($query){
    echo "<script>alert('Record has been deleted successfully')</script>";
    header('location:Job_create.php');
}else{
    echo "<script>alert('Error deleting record')</script>";
}
?>