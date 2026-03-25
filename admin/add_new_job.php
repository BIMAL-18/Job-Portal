<?php
session_start();
include("connection/db.php");
$login =  $_SESSION['email'];

 $Job_Title = $_POST['job_title'];
 $Description = $_POST['Description'];
 $country = $_POST['country'];
 $state = $_POST['state'];
 $city = $_POST['city'];

$query = mysqli_query($conn,"INSERT INTO all_jobs(customer_email,job_title,des,country,state,city) VALUES('$login','$Job_Title','$Description','$country','$state','$city')");
// var_dump($query);//give true or false just for check     
if($query){
    echo "Data Inserted Successfully";
}else{
    echo "Some error occurred";
}
 ?>