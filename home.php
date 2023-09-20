<?php
session_start();
if(!isset($_SESSION['name'])){
    header("location:index.php?mes=<p style='color:red;margin-bottom:10px;'>Please login here!<p>"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
    <div class="home-page">
        <!-- <div> -->
            <h1 align=center>WELCOME <?php echo strtoupper($_SESSION['name']) ?></h1>
            <!-- </div> -->
        </div>
    </div>
    <div class="button">
        <a href="logout.php"><span id="log">Log out</span></a>
    </div>
</body>
</html>