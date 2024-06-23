<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GMS</title>
    <link rel="icon" href="./images/shopping-basket-solid.png" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="./style.css" />
</head>
<body>
   <?php
   include "./header.php";
   include "./connect.php";
   ?>
    <section class="home" id="home">
        <div class="content">
            <h3>fresh and <span>organic </span>Products for your</h3>
            <p>
                daily needs. Shop at our grocery website for a wide selection of high-quality fruits, vegetables, dairy, meat, and pantry items. We guarantee freshness and offer fast, reliable delivery to your doorstep. Start shopping today!
            </p>
            <a href="#vegetables" class="btn">shop now</a>
        </div>
    </section>

    <section class="features" id="features">
        <h1 class="heading">our <span>features</span></h1>
        <div class="box-container">
            <div class="box">
                <img src="images/feature-1.png" alt="" style="width: 33rem" />
                <h3>fresh and organic</h3>
            </div>

            <div class="box">
                <img src="images/feature-2.png" alt="" style="width: 29rem" />
                <h3>free delivery</h3>

            </div>
            <div class="box">
                <img src="images/feature-3.png" alt="" style="width: 37rem" />
                <h3>easy payments</h3>

            </div>
        </div>
    </section>

    <section class="vegetables" id="vegetables">
        <h1 class="heading">Our<span>Products</span></h1>
        <div class="box-container">
        <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `items`") or die('query failed');
         $i=0;
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
               
      ?>    
        <div class="box">
                <img src="uploaded_img/<?php echo $fetch_products['Image']; ?>" alt="" style="width: 30rem; padding-top: 2.5rem" />
                <h3><?php echo $fetch_products['Name']; ?></h3>
                <p>₹ <?php echo $fetch_products['Price']; ?>/-</p>
                <div class="btn-container">
                   
                    <a class="btn" disabled onclick="alert('Login First')">Add to cart</a>
                </div>
            </div>
            <?php
      
        }
      }else{
         echo '<p class="heading">no products added yet!</p>';
      }
      ?>
        </div>
    </section>

    <section class="categories" id="categories">
        <h1 class="heading">product <span>categories</span></h1>
        <div class="box-container">
            <div class="box">
                <img src="images/cat-1.png" alt="" style="width: 30rem; padding-top: 6rem" />
                <h3>vegetables</h3>
                <p>upto 45% off</p>
                <a href="vegetable.php" class="btn">shop now</a>
            </div>
            <div class="box">
                <img src="images/cat-2.png" alt="" style="width: 30rem" />
                <h3>fresh fruits</h3>
                <p>upto 45% off</p>
                <a href="./fruits.php" class="btn">shop now</a>
            </div>
            <div class="box">
                <img src="images/cat-3.png" alt="" style="width: 30rem; padding-top: 2.5rem" />
                <h3>dairy products</h3>
                <p>upto 45% off</p>
                <a href="./dairy.php" class="btn">shop now</a>
            </div>

        </div>
    </section>
   
    <!---Footer Section-->

   
    <?php
    include "./footer.php";
    ?>
     <!---Footer Section-->

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="script.js"></script>
</body>

</html>