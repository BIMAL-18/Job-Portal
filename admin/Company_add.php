<?php
include("connection/db.php");

$Company = $_POST['Company'];
$Description = $_POST['Description'];
//  $Password = $_POST['Password'];
//  $first_name = $_POST['first_name'];
//  $last_name = $_POST['last_name'];
//  $admin_type = $_POST['admin_type'];
$query = mysqli_query($conn,"INSERT INTO company(company,des) VALUES('$Company','$Description')");
// var_dump($query);//give true or false just for check     
if($query){
    echo "Data Inserted Successfully";
}else{
    echo "Some error occurred";
}
?>