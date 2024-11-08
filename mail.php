<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer library

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phone_number'];
  $password = $_POST['password'];

  $mail = new PHPMailer(true);

  try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'mail.rodlinesms.co.tz';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@rodlinesms.co.tz';
    $mail->Password = '@200r320KK'; // Use a secure method to store this
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Recipients
    $mail->setFrom('info@rodlinesms.co.tz', 'Registration');
    $mail->addAddress('info@rodlinesms.co.tz'); // Recipient email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Registration Form Submission';
    $mail->Body    = "First Name: $firstName<br>Last Name: $lastName<br>Email: $email<br>Phone Number: $phoneNumber<br>";

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>
