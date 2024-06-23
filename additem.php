
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        .addItem{
    height: 1200px;
    width: 100vw;
  
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-image: url('images/groc2.jpg');

}
.form{
    height:auto;
    bottom: 35px;
    padding-bottom: 40px;
}
.title::before {
    width: 18px;
    height: 18px;
}

.title::after {
    width: 18px;
    height: 18px;
    animation: pulse 1s linear infinite;
}

.title::before,
.title::after {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    border-radius: 50%;
    left: 0px;
    background-color: #50C87;
}
@keyframes pulse {
    from {
        transform: scale(0.9);
        opacity: 1;
    }
    to {
        transform: scale(1.8);
        opacity: 0;
    }
}

    </style>
</head>
<body>
  <div class="addItem"> 
    <form class="form" action="" method="post" enctype="multipart/form-data">
        <h3>
            <p class="title">Add Item </p><br></h3>
        <p class="message">Add Items for Your customers. </p><br>
        <div class="flex">
            <label>
                <input class="input" type="text" placeholder="" required name="itemname">
                <span>Item Name</span>
            </label>

            <label>
                <input class="input" name="Quantity" type="number" placeholder="" required>
                <span>Quantity</span>
            </label>
        </div>

        <label>
            <input class="input" name="itemprice" maxlength="10" type="number" placeholder="" required>
            <span>Price</span>
        </label>

        <label>
            <input class="input" type="file" name="image" placeholder="" required accept="Image/*"  >
            <span>Item Image</span>
        </label>
        <label>
            <input class="input" type="date" name="exp" placeholder="" required>
            <span>Expiry Date</span>
        </label>
        <label>
            <input class="input" type="date" name="mfg" placeholder="" required>
            <span>Manufacturing Date</span>
        </label>
        <label>
            <input class="input" type="text" name="category" placeholder="" required>
            <span>Category</span>
        </label>
        <br>
        <button class="submit" type="submit" style="background-color: #50C87;" value="add_item" name="add_item">Add Item</button>
 </div> 
</body>
</html>
<?php
include "./connect.php";
if(isset($_POST['add_item'])){
   
    $today = date("Y-m-d");
    if (($today > $_POST['mfg']))  {
    echo "<h1 style='color:red' class='heading'>Manufacturing Date should not be in the future</h1>";
    header("refresh:3; url=./additem.php");
    }elseif(($_POST['exp'] > $_POST['mfg'])){
    echo "<h1 style='color:red' class='heading'>Manufacturing Date should not be Expiry Date</h1>";
    header("refresh:3; url=./additem.php");
    }
        

        
    $name = mysqli_real_escape_string($conn, $_POST['itemname']);
    $price = $_POST['itemprice'];
    $qty = $_POST['Quantity'];
    $mfg = $_POST['mfg'];
    $exp = $_POST['exp'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

   
    
 
    $select_product_name = mysqli_query($conn, "SELECT Name FROM `items` WHERE Name = '$name'") or die('select query failed');
 
    if(mysqli_num_rows($select_product_name) > 0){
       $message[] = 'product name already added';
    }else{
       $add_product_query = mysqli_query($conn, "INSERT INTO `items`VALUES('','$name', '$price','$qty','$exp','$mfg', '$image','$category')") or die('Insert query failed');
 
       if($add_product_query){
          if($image_size > 2000000){
             $message[] = 'image size is too large';
          }else{
             move_uploaded_file($image_tmp_name, $image_folder);
             echo 'product added successfully!';
          }
       }else{
          echo 'product could not be added!';
       }
    }
 }

?>