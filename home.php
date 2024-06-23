<!DOCTYPE html>
<html lang="en">
<?php
include "./head.php";
include "./connect.php";
session_start();
if (!isset($_SESSION["user_name"])) {
    header("location:./index.php");
}
?>

<body>
    <a href="https://wa.me/919120738474" class="chat-icon" target="blank"><img src="./images/whatsapp.png" alt=""></a>

    <header class="header">
        <a href="" class="logo"><i class="fas fa-shopping-basket"></i> GMS</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#features">features</a>
            <a href="#products">products</a>
            <a href="#categories">categories</a>
        </nav>
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search"  style="opacity: 0;cursor:auto;" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <span class="cart-count">0</span>
            <div class="fas fa-user" id="login-btn"></div>
        </div>

        <form action="" class="search-form">
            <input type="text" id="search-box" placeholder="search here..." />
            <label for="search-box" class="fas fa-search"></label>
        </form>
        <div class="shopping-cart">
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
        </div>

        <!-- login form  -->
        <form class="login-form" id="signin" method="post">
            <?php
            echo "<h1>Hello! " . $_SESSION['user_name'] . "<h1/>";
            ?>
            <br><a href="profile.php" id="edit_btn_link"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="logout.php" id="logout_btn_link"><i class="fa-solid fa-power-off"></i> Logout</a>
        </form>

    </header>

    <section class="home" id="home">
        <div class="content">
            <h3>fresh and <span>organic </span>Products for your</h3>
            <p>
                daily needs. Shop at our grocery website for a wide selection of high-quality fruits, vegetables, dairy, meat, and pantry items. We guarantee freshness and offer fast, reliable delivery to your doorstep. Start shopping today!
            </p>
            <a href="#products" class="btn">shop now</a>
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
            $i = 0;
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {

            ?>
                    <div class="box">
                        <img src="uploaded_img/<?php echo $fetch_products['Image']; ?>" alt="" style="width: 30rem; padding-top: 2.5rem" />
                        <h3><?php echo $fetch_products['Name']; ?></h3>
                        <p>₹ <?php echo $fetch_products['Price']; ?>/-</p>
                        <?php $itemid = $fetch_products['ItemID'];?> 
                        <div class="btn-container">
                        <button type="submit" name="cart"><a href="./cart.php?itemid=<?php echo $itemid ?>" class="btn" onclick="addToCart(<?php echo $fetch_products['ItemID']; ?>)">Add to cart</a></button>
                        </div>
                    </div>
            <?php
                }
            } else {
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
                <a href="fruits.php" class="btn">shop now</a>
            </div>
            <div class="box">
                <img src="images/cat-3.png" alt="" style="width: 30rem; padding-top: 2.5rem" />
                <h3>dairy products</h3>
                <p>upto 45% off</p>
                <a href="dairy.php" class="btn">shop now</a>
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
    <script src="cart.js"></script>
</body>

</html>