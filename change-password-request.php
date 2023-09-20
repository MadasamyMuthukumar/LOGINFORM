<?php
session_start();
include ("config.php");

?>
<?php
function send_password_reset(){
    
}
// ini_set('openssl.cafile', '/Users/Admin/Downloads/cacert.pem');
// ini_set('curl.cainfo', '/Users/Admin/Downloads/cacert.pem');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';


/*try {
    // Create a new PHPMailer instance
    $mail = new PHPMailer();
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Mailer="smtp";
    // Server settings
    $mail->SMTPDebug = 4; // Enable debugging (0 for no output, 2 for detailed debugging)
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption (ssl also accepted)
    
    $mail->Port = 587; // TCP port to connect to
 
    $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
  
    $mail->Username = 'maddyramki3@gmail.com'; // SMTP username
    $mail->Password = 'zltc sqpu vsdy kqxe'; // SMTP password
    $mail->isHTML(true); // Set email format to HTML

    $mail->AddAddress('madasamy939@gmail.com'); // Recipient's email and name
    // Sender and recipient
    $mail->SetFrom('maddyramki3@gmail.com'); // Sender's email and name
 

    // Email content

    $mail->Subject = 'Password reset verification';
    $mail->Body = '<p>This is a test email sent using PHPMailer.</p>';

    // Send the email
    if(!$mail->Send()){
        echo "error while sending";
    }else{
        echo 'Email sent successfully.';
    }
 
} catch (Exception $e) {
    echo 'Email sending failed. Error: ', $mail->ErrorInfo;
 }*/



if(isset($_POST["forgot-submit"])){
    echo "sdkgfjdhskfsdjjfklds";
    $user_email=$_POST["email"];
    // $user_name=$_SESSION["name"];
    $token=bin2hex(random_bytes(64));
    $token_hash=hash("sha256",$token);
    $expiry=date("Y-m-d H:i:s",time()+60*30);
    echo $token_hash,$expiry,$user_email;
    if($user_email!=""){
        $sql_select_user="select * from allusers where EMAIL='$user_email'";
        $result=$con->query($sql_select_user);
        if($result->num_rows>0){
            // echo "affectefd";
            $update_token="update allusers set TOKEN='$token_hash',TOKEN_EXPIRY='$expiry' where EMAIL='$user_email'";
            $con->query($update_token);
            
        }else{

        }
        
    }else{

    }
   
}
?>