<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../app/vendor/autoload.php';

function sendMail($data){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'koratuwadairy@gmail.com';                     
        $mail->Password   = 'qveyksinrprmejos';                           
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

        //Recipients
        $mail->setFrom('koratuwadairy@gmail.com', 'Koratuwa');
        $mail->addAddress($data['email']);     //Add a recipient
        
        $name=$data['name'];
        $num=$data['tp_num'];
        $email=$data['email'];

        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Welcome to Koratuwa Community!';
        $mail->Body    = "<p> Dear $name,</p> <h4>It is a pleasure to hire you as an employee at <i>Koratuwa</i>.<br>
        <p> Use you provided email and contact number as username and password respectively to login to our web system given below url.</p>
        <p>http://localhost/Koratuwa/Users/u_home</p>
        username: $email<br>
        password:$num</h4>
        <h3><strong>Be sure to remember to change the password after you log in once!</strong></h3>
        <h4>
        Good Luck!
        <br>
        <p>With regards,</p>
        <b>Koratuwa.</b></h4>";

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function sendOtp($email,$otp,$userName){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'koratuwadairy@gmail.com';                     
        $mail->Password   = 'qveyksinrprmejos';                           
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                                                       

        //Recipients
        $mail->setFrom('koratuwadairy@gmail.com', 'Koratuwa');
        $mail->addAddress($email);     //Add a recipient
        
        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Password Reset Code';
        $mail->Body    = "<p> Dear $userName,</p> <h3>Your Password Reset code is $otp.<br></h3>
        <p> Use this code to verify your account.</p>
        <br><br>
        <p>With regards,</p>
        <b>Koratuwa.</b>";

        $mail->send();


    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}




function sendOtpForEmailVerification($email,$otp,$userName){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'koratuwadairy@gmail.com';                     
        $mail->Password   = 'qveyksinrprmejos';                           
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                                                       

        //Recipients
        $mail->setFrom('koratuwadairy@gmail.com', 'Koratuwa');
        $mail->addAddress($email);     //Add a recipient
        
        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Email Verification Code';
        $mail->Body    = "<p> Dear $userName,</p> <h3>Your Email Verification code is $otp.<br></h3>
        <p> Use this code to Complete Your Registration.</p>
        <br><br>
        <p>With regards,</p>
        <b>Koratuwa.</b>";

        $mail->send();


    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// function sendAdminMail($email,$user){
//     $mail = new PHPMailer(true);
//     $otp=rand(100000,999999);
//     try {
//         //Server settings
//         $mail->isSMTP();                                            
//         $mail->Host       = 'smtp.gmail.com';                       
//         $mail->SMTPAuth   = true;                                   
//         $mail->Username   = 'projecttripify@gmail.com';                     
//         $mail->Password   = MAIL_PASSWORD;                           
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
//         $mail->Port       = 465;                                    

//         //Recipients
//         $mail->setFrom('tripify@gmail.com', 'Tripify');
//         $mail->addAddress($email);     //Add a recipient
        

//         //Content
//         $mail->isHTML(true);                              
//         $mail->Subject = 'Admin Ragistration Confirmation';
//         $mail->Body    = "<p> Dear $user,</p> Congratulations for being singned up as an adminstrator of the Tripfy team.<br>
//         <p> Your username : $email</p>
//         <br>
        
//         <p>Click the link below to change the password of your account</p>
//         <br>
//         <p>http://localhost/Tripify/Admins/changepassword/$otp</p>
//         <br><br>
//         <p>With regards,</p>
//         <b>Tripify.</b>";

//         $mail->send();

//         return $otp;
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
// }



// function sendResetPasswordMail($email){
//     $mail = new PHPMailer(true);
//     $otp=rand(100000,999999);

//     try {
//         //Server settings
//         $mail->isSMTP();                                            
//         $mail->Host       = 'smtp.gmail.com';                       
//         $mail->SMTPAuth   = true;                                   
//         $mail->Username   = 'projecttripify@gmail.com';                     
//         $mail->Password   = MAIL_PASSWORD;                           
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
//         $mail->Port       = 465;                                    

//         //Recipients
//         $mail->setFrom('tripify@gmail.com', 'Tripify');
//         $mail->addAddress($email);     //Add a recipient
        

//         //Content
//         $mail->isHTML(true);                              
//         $mail->Subject = 'Reset Password of Your Tripify Account';
//         $mail->Body    = " <h3>Your verification code is $otp.<br></h3>
//         <p> Use this code to reset your Tripify account password.</p>
//         <br><br>
//         <p>With regards,</p>
//         <b>Tripify.</b>";

//         $mail->send();

//         return $otp;
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
// }

?>