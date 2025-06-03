<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../includes/phpmailer/src/PHPMailer.php';
require '../includes/phpmailer/src/SMTP.php';
require '../includes/phpmailer/src/Exception.php';

function sendCustomerEmail($to, $subject, $bodyHtml) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'manasamanne0704@gmail.com';         // ✅ Replace with your Gmail
        $mail->Password   = 'hlya ifcx bddn slzj';           // ✅ Replace with App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('yourgmail@gmail.com', 'CBD Bakery');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $bodyHtml;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Email Error: {$mail->ErrorInfo}");
        return false;
    }
}
?>
