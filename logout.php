<?php
session_start();
session_destroy();
header("location:index.php?mes=<p style='color:grey;margin-bottom:10px;'>You are logged out!<p>")
?>