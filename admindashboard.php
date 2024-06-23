<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./admin_style.css">
    <style>
        
        table,
        td,
        tr,
        th {
            border: 3px solid #ccc;
            
            border-collapse: collapse;
            padding: 5px;
        }
       

        .main {

            /* display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; */
            font-size: larger;
            padding-top: 10px;
        }

    </style>
    <?php include "./head.php";
     include "./connect.php";
    session_start();
    $admin_name = $_SESSION['admin_name'];

if(!isset($admin_name)){
   header('location:login.php');
}
    ?>
</head>
<body>
  <header class="header" style="position: sticky;">
        <a href="" class="logo"><i class="fas fa-shopping-basket"></i> GMS</a>

        
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn" style="opacity:0;cursor:auto;"></div>
            <div class="fas fa-shopping-cart" id="cart-btn" style="opacity:0;cursor:auto;"></div>
            <div class="fas fa-user" id="login-btn"></div>
        </div>
        <form action="" class="search-form">
            <input type="text" id="search-box" placeholder="search here..." />
            <label for="search-box" class="fas fa-search"></label>
        </form>
        <!-- <div class="shopping-cart">
            <div class="box">
                <i class="fas fa-trash"></i>
                <img src="images/products-3.png" alt="" />
                <div class="content">
                    <h3>watermelon</h3>
                    <span class="price">₹150/KG</span>
                    <span class="quantity">Qty:1</span>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-trash"></i>
                <img src="images/onion.png" alt="" />
                <div class="content">
                    <h3>onion</h3>
                    <span class="price">₹40/KG</span>
                    <span class="quantity">qty:1</span>
                </div>
            </div>

            <div class="total">total: ₹190/-</div>
            <a href="#" class="btn">check out</a>
        </div> -->

       <!-- login form -->
               <form class="login-form" id="signin" method="post">
             <?php
            echo "<h1>Hello! ".$_SESSION['admin_name']."<h1/>";
            ?> 
                  <a href="logout.php" id="logout_btn_link"><i class="fa-solid fa-power-off"></i> Logout</a>
        </form>

    </header> 

    <section class="dashboard">

<h1 class="title">Live dashboard</h1>

<div class="box-container">

<div class="box">
         <?php 
            $users = mysqli_query($conn, "SELECT * FROM `user`") or die('query failed');
            $number_of_users = mysqli_num_rows($users);
         ?>
         <h3><?php echo  $number_of_users; ?></h3>
         <p>Number Of Users </p>
         <div class="main">
        
        <table style="width: 100%;">
            <tr style="background-color:#f5f5f5 ; color:#50C878;">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile</th>
               
            </tr>
             <?php
             $select_products = mysqli_query($conn, "SELECT * FROM `user`") or die('query failed');
             
             if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){?>
                <tr>
                    <td><?php echo $fetch_products['fname']?></td>
                    <td> <?php echo $fetch_products['lname']?></td>
                    <td><?php echo $fetch_products['mobile']?></td>
                
                </tr>
                <?php
}
      }else{
         echo '<p class="heading">no products added yet!</p>';
      }
      ?>
      
        </table>
        
    </div>
</div>

<div class="box">
         <?php 
            $categories = mysqli_query($conn, "SELECT * FROM `category`") or die('query failed');
            $number_of_categories = mysqli_num_rows( $categories);
         ?>
         <h3><?php echo $number_of_categories; ?></h3>
         
         <p>Number Of Categories <a class="add-icon" href="./addcategory.php"><i class="fa-solid fa-plus"></i></a></p> 
         <div class="main">
        
        <table style="width: 100%;">
            <tr style="background-color:#f5f5f5 ; color:#50C878;">
                <th>Category ID</th>
                <th>Category Name</th>
                
               
            </tr>
             <?php
             $select_products = mysqli_query($conn, "SELECT * FROM `category`") or die('query failed');
             
             if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){?>
                <tr>
                    <td><?php echo $fetch_products['category_id']?></td>
                    <td> <?php echo $fetch_products['category_name']?></td>
                   
                
                </tr>
                <?php
}
      }else{
         echo '<p class="heading">no products added yet!</p>';
      }
      ?>
      
        </table>
        
    </div>
         
         
</div>

<div class="box">
         <?php 
            $items = mysqli_query($conn, "SELECT * FROM `items`") or die('query failed');
            $number_of_items = mysqli_num_rows($items);
         ?>
         <h3><?php echo $number_of_items; ?></h3>
         <p>Number Of Products   <a class="add-icon" href="./additem.php"><i class="fa-solid fa-plus"></i></a></p>
         <div class="main">
        
        <table style="width: 100%;">
            <tr style="background-color:#f5f5f5 ; color:#50C878;">
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
               
            </tr>
             <?php
             $select_products = mysqli_query($conn, "SELECT * FROM `items`") or die('query failed');
             
             if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){?>
                <tr>
                    <td><?php echo $fetch_products['Name']?></td>
                    <td>Rs. <?php echo $fetch_products['Price']?> /KG</td>
                    <td><?php echo $fetch_products['Quantity']?></td>
                
                </tr>
                <?php
}
      }else{
         echo '<p class="heading">no products added yet!</p>';
      }
      ?>
      
        </table>
        
    </div>
    
</div>
   

</div>

</section>






  <!-- <?php
include "./footer.php";
?> -->
<script src="./script.js"></script>
</body>

</html>
