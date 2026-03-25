<?php
 $email = $_POST['email'];
 $username = $_POST['Username'];
 $Password = $_POST['Password'];
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $admin_type = $_POST['admin_type'];
include("connection/db.php");

$query =mysqli_query($conn,"insert into admin_login(admin_email,admin_pass,admin_username,first_name,last_name,admin_type)

values('$email','$Password','$username','$first_name','$last_name','$admin_type')");
var_dump($query);

if($query){

echo "<div class='alert alert-success>Data Inserted Sucessfully<div/>";
}else{
    echo "<div class='alert alert-danger> Some error come </div>";
}


?>