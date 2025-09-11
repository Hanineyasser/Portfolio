<?php
// Simple contact form handler
// Replace with your email address
$to = 'hanineyasserhassan@gmail.com';
$subject = 'New Contact Form Message';

// Get form data
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$subject_field = isset($_POST['subject']) ? $_POST['subject'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Basic validation
if (empty($name) || empty($email) || empty($subject_field) || empty($message)) {
  http_response_code(400);
  echo 'Please fill in all fields.';
  exit;
}

// Build email body
$body = "Name: $name\nEmail: $email\nSubject: $subject_field\nMessage:\n$message";
$headers = "From: $email\r\nReply-To: $email\r\n";

// Send email
if (mail($to, $subject, $body, $headers)) {
  echo 'Your message has been sent. Thank you!';
} else {
  http_response_code(500);
  echo 'There was an error sending your message.';
}
?>
