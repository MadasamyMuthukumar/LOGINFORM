<?php

$con=new mysqli("localhost","root","","mydemodb");
if($con->connect_error){
echo $con->connect_error;
die("Database not connected!");
}
?>