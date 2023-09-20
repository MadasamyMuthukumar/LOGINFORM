<?php
// session_start();
include ("registerProcess.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
//             $(document).ready(function() {
//             $("#register-form").submit(function(event) {
//                 // event.preventDefault(); // Prevent the default form submission
// // echo $_SESSION["flag"];

// // Your custom JavaScript logic here

//                 // For example, you can display an alert
//                 // alert("Form submission prevented!");

//                 // Or you can perform an AJAX request, etc.
//             });
//         });
  $(document).ready(function() {
    $("#username").on("keyup", function() {
      var inputValue = $(this).val();
      $.post("registerProcess.php", { inputField: inputValue }, function(response) {
        // Handle the response from the PHP file here
        // console.log(response);
        $("#username-info").html(response);
      });
    });
  });
  $(document).ready(function() {
    $("#email").on("keyup", function() {
      var inputValue = $(this).val();
      $.post("registerProcess.php", { email: inputValue }, function(response) {
        // Handle the response from the PHP file here
        // console.log(response);
        $("#email-info").html(response);
      });
    });
  });
  $(document).ready(function() {
            $("#p1, #p2").keyup(function() {
                var input1Value = $("#p1").val();
                var input2Value = $("#p2").val();

                // Send the values to a PHP file via $.post
                $.post("registerProcess.php", {
                    p1: input1Value,
                    p2: input2Value
                }, function(response) {
                    // Display the response from the PHP file
                    $("#pass-info").html(response);
                });
            });
        });
$(document).ready(function() {
    $("#phone").on("keyup", function() {
      var inputValue = $(this).val();
      $.post("registerProcess.php", { phone: inputValue }, function(response) {
        // Handle the response from the PHP file here
        // console.log(response);
        $("#phone-info").html(response);
      });
    });
  });

</script>
</head>
<body>
    <div class="container">
<div class="registration form">
      <header>Signup</header>
      <span id="login-info">
      <?php
      if(isset($_GET["mes"])){
      echo $_GET["mes"]; 
        }
        if(isset($_GET["email"])){
          echo $_GET["email"]; 
            }
            if(isset($_GET["phone"])){
              echo $_GET["phone"]; 
                }
                if(isset($_GET["pass"])){
                  echo $_GET["pass"]; 
                    }
      ?>
      </span>
      <form action="#" method="post" id="register-form">
      <input type="text" name="fullname" placeholder="Enter your Fullname" required>
      <input type="text" name="user-name" id="username" placeholder="Enter your Username" required>
      <span id="username-info"> 
      <?php
      if(isset($_GET["username"])){
      echo $_GET["username"]; 
        }
      ?>
      </span>
      <div class="radio-btn">
      <div>
     
      <input type="radio" name="gender" id="male" value="Male" checked>
      <label for="male">Male</label>
      </div>
      <div>
     
      <input type="radio" name="gender" id="female" value="Female">
      <label for="female">Female</label>
      </div>
      <div>
     
      <input type="radio" name="gender" id="other" value="Other">
      <label for="other">Other</label>
      </div>
      </div>
      <input type="text" name="phonenumber" placeholder="Enter your Phone number" id="phone" required>
      <span id="phone-info"></span>
        <input type="text" name="email" id="email" placeholder="Enter your email" required>
        <span id="email-info"></span>
        <input type="password" name="pass-word" placeholder="Create a password" id="p1" required>
        <input type="password" name="confirmpassword" placeholder="Confirm your password" id="p2" required>
        <span id="pass-info"></span>
        <input type="submit" name="signupSubmit" class="button" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <!-- <label for="check">Login</label> -->
         <a href="index.php">Login</a>
        </span>
      </div>
    </div>
    </div>
</body>
</html>