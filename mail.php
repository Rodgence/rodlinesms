<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];  // The email is not needed anymore but you might want to keep it for future use
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    // Your SMS API credentials
    $api_key = '7ea69236bb5bbf22';  // Replace with your actual API key
    $secret_key = 'ZWRmM2QzNWQyYWE4M2MwZjlmZDQ2YzdhY2RjN2RiYWVhMDZmZjk4YTY5MzIwMzdiMDQ3ZTA5YTFmMzY0YzBlYw==';  // Replace with your actual secret key

    // Prepare the message to send via SMS
    $message = "Habari $first_name, Umefanikiwa kujisajiri RodLine SMS, Tembelea https://rodlinesms.co.tz";

    // URL for the SMS API endpoint
    $Url = 'https://apisms.beem.africa/v1/send';

    // Prepare the data to be sent in the POST request for SMS
    $postData = array(
        'source_addr' => 'RodLine',
        'encoding' => 0,
        'schedule_time' => '',
        'message' => $message,
        'recipients' => [
            array('recipient_id' => '1', 'dest_addr' => $phone_number)
        ]
    );

    // Initialize cURL for SMS
    $ch = curl_init($Url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ' . base64_encode("$api_key:$secret_key"),
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));

    // Execute the cURL request for SMS
    $smsResponse = curl_exec($ch);
    
    // Handle errors if any
    if ($smsResponse === FALSE) {
        echo "Error sending SMS: " . curl_error($ch);
    } else {
        // Optionally, you can handle the response and display a message to the user
        $responseData = json_decode($smsResponse, true);
        if ($responseData && $responseData['code'] == 100) {
            echo "Umefanikiwa kujisajiri. Asante kwa kuchagua RodLine SMS.";
        } else {
            echo "There was an issue sending the welcome SMS.";
        }
    }

    // Close cURL
    curl_close($ch);
}
?>
