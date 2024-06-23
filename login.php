<?php
include"./connect.php";
session_start();


if(isset($_REQUEST['submit'])){

    $mobile =mysqli_real_escape_string($conn,$_POST['mobile']);
    $pass = mysqli_real_escape_string($conn,$_POST['pwd']);
   
 
    $query = mysqli_query($conn, "SELECT * FROM user WHERE mobile = '$mobile' AND pwd = '$pass'") ;
 
    if(mysqli_num_rows($query) > 0){
 
       $row = mysqli_fetch_assoc($query);
 
       if($row['mobile'] == '7235047914' & $row['fname'] == 'Admin'){
 
          $_SESSION['admin_name'] = $row['fname'];
          $_SESSION['admin_mobile'] = $row['mobile'];
          
          header('location:./admindashboard.php');
 
       }else{
 
          $_SESSION['user_name'] = $row['fname'];
          $_SESSION['user_mobile'] = $row['mobile'];
          
          header('location:home.php');
 
       }}
       else{
          header("location:failed.php");
         }
      }



?>