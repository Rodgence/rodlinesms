<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   // Replace these with your actual API key and secret key
   $api_key = '7ea69236bb5bbf22v';
   $secret_key = 'ZWRmM2QzNWQyYWE4M2MwZjlmZDQ2YzdhY2RjN2RiYWVhMDZmZjk4YTY5MzIwMzdiMDQ3ZTA5YTFmMzY0YzBlYw==';

    // Collect user input from the form submission
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $message_content = htmlspecialchars($_POST['message']);

    // Construct the message with user information
    $message = "New Registration:\n";
    $message .= "First Name: $first_name\n";
    $message .= "Last Name: $last_name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone_number\n";
    $message .= "Message: $message_content\n";

    // Prepare the recipients (your phone number as the recipient)
    $recipients = array(
        array('recipient_id' => '1', 'dest_addr' => '+255621764385'),  // Send to your phone number
        // You can add more numbers here if needed
    );

    // Prepare the data to send to the API
    $postData = array(
        'source_addr' => 'INFO',
        'encoding' => 0,  // 0 means the message will be sent in SMS-7 encoding
        'schedule_time' => '',
        'message' => $message,  // Dynamically populated message
        'recipients' => $recipients // Array of recipients
    );

    // API URL for sending the SMS
    $Url = 'https://apisms.beem.africa/v1/send';

    // cURL initialization
    $ch = curl_init($Url);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ' . base64_encode("$api_key:$secret_key"),
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));

    // Execute the cURL request
    $response = curl_exec($ch);

    // Check for errors
    if ($response === FALSE) {
        echo "Error: " . curl_error($ch);
        die();
    }

    // Decode the JSON response safely
    $response_data = json_decode($response, true);

    // Check if the response is valid and contains the 'successful' key
    if (is_array($response_data) && isset($response_data['successful']) && $response_data['successful']) {
        // Display success message
        echo "Your information has been sent successfully!";
    } else {
        // If the response doesn't contain 'successful', display the whole response for debugging
        echo "There was an issue sending your message. Response: " . json_encode($response_data);
    }

    // Close the cURL session
    curl_close($ch);
}
?>
