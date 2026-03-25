<?php
include('connection/db.php');

$del = intval($_GET['del']);

$query = mysqli_query($conn, "DELETE FROM company WHERE company_id='$del'");

if($query){
    echo "<script>alert('Record has been deleted successfully')</script>";
    header('location:create_company.php');
}else{
    echo "<script>alert('Error deleting record')</script>";
}
?>