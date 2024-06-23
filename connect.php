<?php

$conn = mysqli_connect("localhost", "root", "","grocery");

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>