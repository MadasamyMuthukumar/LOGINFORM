<?php
session_start();
include ("config.php");
?>
<?php
function checkALlFields($name,$username,$gender,$phonenum,$email,$password,$confirm_password){
    if($name!="" && $username!="" && $gender!="" && $phonenum!="" && $email!="" && $password!="" && $confirm_password!=""){
        return true;
    }
}
// $flag=false;
// if(isset($_POST["inputField"])){
//     $username=$_POST["inputField"];
//     if(strlen($username)>=5){
//         $sql_check_username="select * from allusers where USERNAME='$username'";
//        $result= $con->query($sql_check_username);
//        if($result->num_rows==0){
//         $flag=true;
//        }else{
//         echo "<p style='color:red;margin-bottom:10px;'>Username already taken!<p>";
//         $flag=false;
//        }
      
//     }else{
//         echo "<p style='color:red;margin-bottom:10px;'>Username must be more than 5 characters<p>";
//         $flag=false;
//     }
// }

// function checkusername(){
    
// }
?>
<?php
$flag="";
if(isset($_POST["inputField"])){
    $username=$_POST["inputField"];
    if(strlen($username)<=8){
        $sql_check_username="select * from allusers where USERNAME='$username'";
       $result= $con->query($sql_check_username);
       if($result->num_rows>0){
        echo "<p style='color:red;margin-bottom:10px;'>Username already taken!<p>";
        $_SESSION["username"]=false;
       }else{
        $_SESSION["username"]=true;
       }
      
    }else{
        echo "<p style='color:red;margin-bottom:10px;'>Username must be less than 8 characters<p>";
        $_SESSION["username"]=false;
    }
}
if(isset($_POST["email"])){
    $email=$_POST["email"];
    // echo $email;
    $email_sanitized=filter_var($email,FILTER_SANITIZE_EMAIL);
    // echo ($filtered);
    // echo "<BR>";
    if(!(filter_var($email_sanitized,FILTER_VALIDATE_EMAIL))){
        echo "<p style='color:red;margin-bottom:10px;'>Not a valid Email<p>";
        $_SESSION["email"]=false;
    }else{
        $_SESSION["email"]=true;
}
}

if(isset($_POST["phone"])){
    $phone_no=$_POST["phone"];
    $phone_no= preg_replace("/[^0-9]/", "", $phone_no);

    // Check if the phone number contains exactly 10 digits (adjust as needed)
    if (strlen($phone_no) != 10) {
        echo "<p style='color:red;margin-bottom:10px;'>Not a valid Phone Number<p>";
        $_SESSION["phone"]=false;
    } else{
        $_SESSION["phone"]=true;
    }
}

if (isset($_POST['p1']) && isset($_POST['p2'])) {
    $input1 = $_POST['p1'];
    $input2 = $_POST['p2'];
    if(strlen($input1)<=8 && strlen($input2)<=8){
    // Process the values or perform any necessary calculations here
    // $result = "Input 1: " . $input1 . "<br>Input 2: " . $input2;
    if(($input1!=$input2) && ($input1!="" && $input2!="")){
        echo "<p style='color:red;margin-bottom:10px;'>Password Mismatch!<p>";
        $_SESSION["pass"]=false;
    }else{
        $_SESSION["pass"]=true;
    }
}else{
    echo "<p style='color:red;margin-bottom:10px;'>Password must less than 8 Characters!<p>";
    $_SESSION["pass"]=false;
}

    // Send the result back to the JavaScript code
} 


if(isset($_POST["signupSubmit"])){
$name=$_POST["fullname"];
$username=$_POST["user-name"];
$gender=$_POST["gender"];
$phonenum=$_POST["phonenumber"];
$email=$_POST["email"];
$password=$_POST["pass-word"];
$confirm_password=$_POST["confirmpassword"];
if(checkALlFields($name,$username,$gender,$phonenum,$email,$password,$confirm_password)){
if($_SESSION["username"] && $_SESSION["email"] && $_SESSION["phone"] && $_SESSION["pass"]){
$sql_add_newuser="insert into allusers(FULLNAME,USERNAME,GENDER,PHONENUMBER,EMAIL,PASSWORD) values('$name','$username','$gender','$phonenum','$email','$password')";
$con->query($sql_add_newuser);
header("location:index.php?mes=<p style='color:green;margin-bottom:10px;'>New user added succesfully Please Login here!<p>");
}else{
    if(!$_SESSION["username"] ){
        header("location:registerform.php?mes=<p style='color:red;margin-bottom:10px;'>Something wrong in username Please re-enter!<p>");
    }
    if(!$_SESSION["email"] ){
        header("location:registerform.php?email=<p style='color:red;margin-bottom:10px;'>Something wrong in Email Please re-enter!<p>");
    }
    if(!$_SESSION["phone"] ){
        header("location:registerform.php?phone=<p style='color:red;margin-bottom:10px;'>Something wrong in Phonenumber Please re-enter!<p>");
    }
    if(!$_SESSION["pass"] ){
        header("location:registerform.php?pass=<p style='color:red;margin-bottom:10px;'>Something wrong in Password Please re-enter!<p>");
    }
   
}
    // if(strlen($username)<=8){
    //     $sql_check_username="select * from allusers where USERNAME='$username'";
    //    $result= $con->query($sql_check_username);
    //    if($result->num_rows>0){
    //     header("location:registerform.php?mes=<p style='color:red;margin-bottom:10px;'>Username already taken!<p>");
    //     }else{
        
    //    }
      
    // }
    // else{
    //     // header("location:registerform.php?username=<p style='color:red;margin-bottom:10px;'>Username must be more than 5 characters<p>");
    // }


// $result=$con->query($sql_check_username);
// if($result->num_rows>0){
//     echo "username already taken";
// }else{
//     echo "username available";
// }


}else{
    header("location:registerform.php?mes=<p style='color:red;margin-bottom:10px;'>Please enter all fields!<p>");
}
}
?>