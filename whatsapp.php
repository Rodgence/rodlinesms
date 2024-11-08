<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $whatsapp_number = "255769500302";  // Enter your WhatsApp number
    $message = "New Registration: \n";
    $message .= "First Name: " . $_POST['first_name'] . "\n";
    $message .= "Last Name: " . $_POST['last_name'] . "\n";
    $message .= "Email: " . $_POST['email'] . "\n";
    $message .= "Phone: " . $_POST['phone_number'] . "\n";
    $message = urlencode($message);  // URL-encode the message

    // Redirect to WhatsApp with prefilled message
    $url = "https://wa.me/$whatsapp_number?text=$message";
    header("Location: $url");
    exit();
}
