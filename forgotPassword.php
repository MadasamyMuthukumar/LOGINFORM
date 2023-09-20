<?php
include ("change-password-request.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function() {
            $('#email').on('input', function() {
                var email = $(this).val();
                var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

                if (emailRegex.test(email)) {
                    $('#emailError').html('<p style=color:green;margin-bottom:10px;>Valid Email address<p>');
                } else {
                    $('#emailError').html('<p style=color:red;margin-bottom:10px;>Invalid Email address<p>');
                }
            });
        });
    </script>
    <!-- <link rel="stylesheet" href="home.css"> -->
</head>
<body>
  <div class="container">
    <div class="form">
        <header>Password Reset</header>
        <span id="emailError"></span>
    <form action="#" method="post">
    <input type="email"  id="email" name="email" placeholder="Enter your Email">
        <input type="submit" name="forgot-submit" class="button" value="Submit">
    </form>
    </div>
  </div>
    <?php
    
    ?>
</body>
</html>