<?php

include "./connect.php";
if (isset($_REQUEST["submit"])) {

    $fname =  mysqli_real_escape_string($conn,$_POST['fname']);
    $lname =  mysqli_real_escape_string($conn,$_POST['lname']);
    $pwd = mysqli_real_escape_string($conn,($_POST['pwd']));
    
    $pwd2 = mysqli_real_escape_string($conn,($_POST['cpwd']));
  
    $mobile =  mysqli_real_escape_string($conn,$_POST['mobile']);

    $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE mobile = '$mobile' AND pwd = '$pwd'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {
        $message[] = 'user already exist!';
    } else {
        if ($pwd != $pwd2) {
            $message[] = 'confirm password not matched!';
        } else {
            mysqli_query($conn, "INSERT INTO `user` VALUES('$fname', '$lname', '$pwd', '$mobile')") or die('query failed');
            $message[] = 'registered successfully!';
            header('location:index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="register.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="footer.css"> -->
</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
      <div class="heading">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
        }
    } ?>
    <div class="register">
        <div class="left">
            <div class="up">
                <h1>Looks Like You Are New Here!</h1><br>
                <h3>Sign up with your mobile number to get started</h3>
            </div>
            <div class="logo">
                <a href="" class="logo"><i class="fas fa-shopping-basket"></i> GMS</a>
            </div>
        </div>
        <form class="form" action="" method="post">
            <div class="flex">
                <label>
                    <input class="input" type="text" placeholder="" required="" name="fname">
                    <span>Firstname</span>
                </label>

                <label>
                    <input class="input" name="lname" type="text" placeholder="" required="">
                    <span>Lastname</span>
                </label>
            </div>

            <label>
                <input class="input" name="mobile" maxlength="10" type="tel" placeholder="" required="">
                <span>Mobile</span>
            </label>
            <label>
                <input class="input" type="password" name="pwd" placeholder="" required="">
                <span>Set Password</span>
            </label>
            <label>
                <input class="input" type="password" name="cpwd" placeholder="" required="">
                <span>Confirm password</span>
            </label><br>
            <button class="submit" value="submit" name="submit">Sign Up</button>
            <p class="signin">Already have an account ?
                <a href=""><u>Login</u></a>
            </p>
        </form>
    </div>

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