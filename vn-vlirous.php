<?php

require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if ($_POST) {
    try {
        $mail = new PHPMailer(true);

        // Cấu hình SMTP
        $mail->SMTPDebug = 0; // Tắt debug khi không cần thiết
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->Username = "dmon70998@gmail.com";
        $mail->Password = "fllg sjue mayg fpwb";
        $mail->setFrom("dmon70998@gmail.com", "VN-JP Landing Pages");
        $mail->addAddress("cie@ptit.edu.vn", "CIE-PTIT");
        //cie@ptit.edu.vn"
        $mail->isHTML(true);

        // Kiểm tra hành động gửi thông tin cá nhân
        if (isset($_POST['action']) && $_POST['action'] == 'Submit Info') {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $content = $_POST["message"];
            $message = "Name: $name<br>Email: $email<br>Content: $content";
            $subject = "Contact to us from Vlir.si";
            $mail->Body = $message;
            $mail->Subject = $subject;
            $mail->send();
            // echo "Information has been sent";
        }

        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>