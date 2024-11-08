<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Replace these with your actual API key and secret key
    $api_key = '7ea69236bb5bbf22';
    $secret_key = 'ZWRmM2QzNWQyYWE4M2MwZjlmZDQ2YzdhY2RjN2RiYWVhMDZmZjk4YTY5MzIwMzdiMDQ3ZTA5YTFmMzY0YzBlYw==';

    // Collect user input
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $message_content = htmlspecialchars($_POST['message']);

    // Construct the message with user info
    $message = "New Customer for SMS:\n";
    $message .= "First Name: $first_name\n";
    $message .= "Last Name: $last_name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone_number\n";
    $message .= "Message: $message_content\n";

    // Recipients' phone number (your phone)
    $recipients = array(
        array('recipient_id' => '1', 'dest_addr' => '+255621764385'),
    );

    // Prepare the POST data
    $postData = array(
        'source_addr' => 'RodLine',
        'encoding' => 0,
        'schedule_time' => '',
        'message' => $message,
        'recipients' => $recipients
    );

    // API URL for sending the SMS
    $Url = 'https://apisms.beem.africa/v1/send';

    // Initialize cURL
    $ch = curl_init($Url);
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

    // Handle cURL error
    if ($response === FALSE) {
        echo "Error: " . curl_error($ch);
        die();
    }

    // Decode the JSON response
    $response_data = json_decode($response, true);

    // Check if the response contains success info
    if (is_array($response_data) && isset($response_data['successful']) && $response_data['successful']) {
        // Success message
        echo "Success! Thank you to register with RodLine SMS!";
    } else {
        // Error handling for invalid response
        echo "There was an issue sending your message. Response: ";
        var_dump($response_data);
    }

    // Close the cURL session
    curl_close($ch);
}
?>
