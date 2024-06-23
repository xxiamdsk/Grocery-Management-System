<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegetables</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .nav1 {
            position: relative;
            z-index: 1;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="nav1">
        <?php
        include "./header.php";
        include "./connect.php";
        ?>
    </div>

    <section class="vegetables" id="vegetables">
        <h1 class="heading"><span>vegetables</span></h1>
        <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `items` where Category='Vegetables'") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {

            ?>      
             <form action="" method="get">
                    <div class="box">
                        <img src="uploaded_img/<?php echo $fetch_products['Image']; ?>" alt="" style="width: 30rem; padding-top: 2.5rem" />
                        <h3><?php echo $fetch_products['Name']; ?></h3>
                        <p>₹ <?php echo $fetch_products['Price']; ?>/KG</p>
                       <?php $itemid = $fetch_products['ItemID'];?> 
                        <div class="btn-container">
                            <button type="submit" name="cart"><a href="./cart.php?itemid=<?php echo $itemid ?>" class="btn" onclick="addToCart(<?php echo $fetch_products['ItemID']; ?>)">Add to cart</a></button>
                        </div>
                    </div>
                    </form> 
            <?php
                }
            } else {
                echo '<p class="heading">no products added yet!</p>';
            }
            ?>
        </div>
    </section>

    <?php
    include "./footer.php";
    ?>
    <script src="cart.js"></script>
</body>

</html>