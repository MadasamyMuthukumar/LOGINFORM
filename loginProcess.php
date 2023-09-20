<?php
session_start();
include ("config.php");
?>
<?php

 if(isset($_POST["loginSubmit"])){
        $username= $_POST["username"];
        $password=$_POST["password"];
        if($username!="" && $password!=""){
        $sql_check_valid_user="select * from allusers where USERNAME='$username' and PASSWORD='$password'";
        $result=$con->query($sql_check_valid_user);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $_SESSION['name']=$row["FULLNAME"];
            }
            $sql_put_login_table="insert into login(USERNAME,LOG) values('$username',now())";
            $con->query($sql_put_login_table);
            echo "true";
            header("location:home.php");
        }else{
            header("location:index.php?mes=<p style='color:red;margin-bottom:10px;'>Wrong username or password!<p>");
        }
    }else{
        header("location:index.php?mes=<p style='color:red;margin-bottom:10px;'>Please enter all fields!<p>");
        // echo "enter all fields";
    }
        // echo $username,$password;


 }
?>