<?php
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Example: Perform some validation (you can customize this based on your requirements)
    if (empty($name) || empty($email) || empty($message)) {
        // If required fields are empty, return an error response
        echo json_encode(array('error' => true, 'message' => 'Please fill out all required fields.'));
        exit;
    }
    
    // Example: Send the email (you would need to configure this based on your email setup)
    $to = 'ethanlukejohnston@gmail.com';
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    
    // Send email using mail() function (this is a basic example, consider using a library for more complex email sending)
    if (mail($to, $subject, $body)) {
        // If mail sent successfully, return a success response
        echo json_encode(array('error' => false));
        exit;
    } else {
        // If there was an error sending the email, return an error response
        echo json_encode(array('error' => true, 'message' => 'Failed to send message. Please try again later.'));
        exit;
    }
} else {
    // If the request method is not POST, return an error response
    echo json_encode(array('error' => true, 'message' => 'Invalid request method.'));
    exit;
}
?>