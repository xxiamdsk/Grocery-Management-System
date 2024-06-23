<?php

include"./connect.php";
$fname =  $_REQUEST['fname'];
$lname =  $_REQUEST['lname'];
$pwd =  $_REQUEST['pwd'];
$pwd2 =  $_REQUEST['cpwd'];
$mobile =  $_REQUEST['mobile'];

// attempt insert query execution
if($pwd == $pwd2){
$sql = "INSERT INTO user VALUES ('$fname', '$lname','$pwd','$mobile')";
	if(mysqli_query($conn, $sql)){
	    
		header('Location: index.php');
	}
} 
else{
   
    header('Location: failed.html');
}
mysqli_close($conn);
?>

