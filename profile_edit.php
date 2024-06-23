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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Edit</title>
    <link rel="stylesheet" href="profile.css">
</head>

<body>

    <main>
        <div class="container">
            <div class="left">
                <a href="./home.php"><div class="back-btn"> <<< Back</div></a>
                <div class="top-container">
                    <div class="image-container">
                        <img src="https://static-assets-web.flixcart.com/fk-p-linchpin-web/fk-cp-zion/img/profile-pic-male_4811a1.svg" alt="" style="height: 50px; width: 50px;">
                    </div>
                    <div class="name">
                        <span class="hello">HELLO,</span><br>
                        <?php
                        echo "<span>".$_SESSION['user_name']."</span>";
                        ?>
                    </div>
                </div><br>

                <div class="middle-container">
                    <div class="my-orders">
                        <div class="fas fa-shopping-cart" id="cart-btn"></div>
                        <a href="" style="margin-right: 60px;"><span>MY ORDERS </span></a>
                    </div>
                    <div class="account-settings">
                        <div class="box1">
                            <div class="fas fa-user" id="login-btn"></div>
                            <span>Account Settings</span>
                        </div>
                        <a href="#personal-info"><span class="account">Profile Information</span></a><br>
                        <a href="#address"><span class="account">Manage Addresses</span></a>
                    </div>
                </div>

                <div class="bottom-container">
                    <a href="logout.php" id="logout_btn_link">
                        <div class="log_out-btn"><i class="fa-solid fa-power-off"></i> Log out</div>
                    </a>
                </div>
            </div>
         
        <form action="#" method="post" >
            <div class="right">
                <div id="personal-info">
                    <h1>Personal Information </h1>
                    <div class="boxes-container">
                        <input type="text" placeholder="First name" name="fname" id="" class="box" required>
                        <input type="text" placeholder="Last name" name="lname" id="" class="box"  required>
                    </div>
                </div>
                <!-- <div class="email-add">
                    <h1>Email Address </h1>
                    <input type="email" placeholder="E-mail Id" name="" id="" class="box" disabled>
                </div> -->
                <div class="mobile-number">
                    <h1>Mobile Number </h1>
                    <input type="tel" placeholder="Mobile number" name="mobile" maxlength="10" class="box" required>
                </div><br><br>
                <button type="submit" style="margin-bottom: 5px;" id="save" class="save btn btns" value="save" name="save"><i class="fas fa-save"  > </i> save</button>
                </form>
                <?php
                       
                       if(isset($_REQUEST['save'])){
                          $fname = $_POST["fname"];
                          $lname = $_POST["lname"];
                          $mobile = $_POST["mobile"];
                          
                         

                          $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE `mobile` = '$mobile'") or die('query failed');
          
                        //   if(mysqli_num_rows($select_users) == 1){
                        //       echo "<h1 class='heading' style='color:red;'>Mobile Number already Present in Database.</h1>";
                        //   }
                        //  else{
                            
                            $user_mobile = $_SESSION["user_mobile"];
                          $query="UPDATE `user` SET `fname` = '$fname',`lname` = '$lname' ,`mobile` = '$mobile' WHERE `user`.`mobile` = '$user_mobile';";
                          mysqli_query($conn,$query);
                          $_SESSION['user_mobile'] = $mobile;
                          $_SESSION['user_name'] = $fname;
                          header("location:./profile.php");
                        //  }
          
                          
                       }
                          ?>
                <div class="border-btm"></div><br><br>
                <div class="addresses" id="address">
                    <h1>MANAGE ADDRESS </h1><br>
                    <div class="sections">
                        <div class="section-1">
                            <input type="text" name="" placeholder="Name" id="" class="box">
                            <input type="tel" placeholder="Mobile number" name="" maxlength="10" class="box">
                        </div>

                        <div class="section-2">
                            <input type="tel" name="" placeholder="Pin code" maxlength="6" id="" class="box">
                            <input type="text" name="" placeholder="Locality" id="" class="box" disabled>
                        </div>
                    </div>

                    <div class="section-3">
                        <textarea name="" placeholder="Address(Area and Street)" id="" cols="30" rows="5" disabled></textarea>
                    </div>

                    <div class="section-4">
                        <input type="text" placeholder="City" name=" " id="" class="box">
                        <select name="" id="" class="box" disabled>
                            <option value="">Select State</option>
                            <option value="">Uttar Pradesh</option>
                            <option value="">Madhya Pradesh</option>
                            <option value="">Arunachal Pradesh</option>
                            <option value="">Himachal Pradesh</option>
                        </select>
                    </div>

                    <div class="section-5">
                        <input type="text" placeholder="Landmark" name="" id="" class="box">
                        <input type="tel" placeholder="Alternate moblie number" name="" id="" class="box">
                    </div>
                </div>
                <div class="buttons">
                    <div class="edit btn btns">Edit</div>
                    <div class="save btn btns">Save</div>
                </div>
            </div>
        </div>
    </main><br><br>

    <!---Footer Section-->
    <?php
    include "./footer.php";
    ?>

    <script>
        // Function to validate mobile number input
        function validateMobile(input) {
            let numericInput = input.value.replace(/\D/g, ''); // Remove non-numeric characters
            input.value = numericInput; // Update input value
        }

        // Function to restrict name fields to only accept letters and spaces
        function restrictName(input) {
            let validInput = input.value.replace(/[^a-zA-Z\s]/g, ''); // Remove non-alphabetic characters
            input.value = validInput; // Update input value
        }

        // Apply validation to mobile number field
        let mobileInput = document.querySelector('input[name="mobile"]');
        mobileInput.addEventListener('input', function() {
            validateMobile(this);
        });

        // Apply validation to name fields
        let nameInputs = document.querySelectorAll('input[name="fname"], input[name="lname"]');
        nameInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                restrictName(this);
            });
        });
    </script>
</body>

</html>