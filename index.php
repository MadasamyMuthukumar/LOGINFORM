
<?php
include ("loginProcess.php");

?>
<!DOCTYPE html>
<!---Coding By CoderGirl | www.codinglabweb.com--->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Form</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <!-- <input type="checkbox" id="check"> -->
    <div class="login form"> 
      <header>Login</header>
      <span id="login-info">
      <?php
      if(isset($_GET["mes"])){
      echo $_GET["mes"]; 
        }
      ?>
      </span>
      <form action="#" method="post" >
        <input type="text" autocomplete="off" id="username" name="username" placeholder="Enter your username">
        <input type="password"  autocomplete="off" id="password" name="password" placeholder="Enter your password">
        <a href="forgotPassword.php">Forgot password?</a>
        <input type="submit" name="loginSubmit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <!-- <label for="check">register</label> -->
         <a href="registerform.php">register</a>
        </span>
      </div>
    </div>
    <!-- <div class="registration form">
      <header>Signup</header>
      <form action="#" method="post" id="form2">
      <input type="text" name="fullname" placeholder="Enter your Fullname">
      <input type="text" name="user-name" placeholder="Enter your Username">
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
      <input type="text" name="phonenumber" placeholder="Enter your Phone number">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="pass-word" placeholder="Create a password">
        <input type="password" name="confirmpassword" placeholder="Confirm your password">
        <input type="submit" name="signupSubmit" class="button" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div> -->
  </div>
</body>
</html>
