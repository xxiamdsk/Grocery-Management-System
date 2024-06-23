<?php
include "./head.php";
include "./connect.php";
session_start();
if (!isset($_SESSION["user_name"])) {
  header("location:./index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Cart</title>



  <link rel="stylesheet" href="cart.css">


</head>

<body>
  <h1><u>Cart</u></h1>
  <table>
    <thead>
      <tr>
        <th>item Name</th>
        <th>Price</th>
        <th>Quantity</th>

        <th>Action2</th>
      </tr>
      <thead>
      <tbody>
        <?php
        $itemid = $_GET["itemid"];




        $select_products = mysqli_query($conn, "SELECT * FROM `items` where ItemID='$itemid'") or die('query failed');

        if (mysqli_num_rows($select_products) > 0) {
          $fetch_products = mysqli_fetch_assoc($select_products);
          $name = $fetch_products['Name'];
          $price = $fetch_products['Price'];
          $user_mobile = $_SESSION["user_mobile"];


          $add_item = mysqli_query($conn, "INSERT INTO cart  (`ID`, `item_name`, `price`, `quantity`, `user_mobile`) VALUES (null, '$name', '$price', 1,' $user_mobile')") or die("Not Added");




          ?>
          <?php
          $select_products = mysqli_query($conn, "SELECT * FROM `cart` ") or die('query failed');

          if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {

              ?>
              <tr>
                <td> <?php echo $fetch_products["item_name"] ?> </td>
                <td><?php echo $fetch_products["price"] ?> </td>
                <td>1</td>
                <?php $product_id = $fetch_products["ID"]; ?>
                <td><a href="cart-delete.php?product_id=<?php echo $product_id ?>">delete <i class="fas fa-trash"></i></a>
                </td>
              </tr>

              <?php


            }
            echo " <div class='btn-container'>
                            <button type='submit' name='cart'><a href='home.php' class='btn' >Add More Products <i class='fa-solid fa-plus'></i></a></button>
                        </div>";

          } else {
            echo '<p class="heading">no products added yet!</p>';
          }
          ?>
          <?php

        } else {
          echo '<p class="heading">no products added yet!</p>';
        }



        ?>





</body>

</html>