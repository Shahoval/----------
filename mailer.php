<?php
// Get form data
$name = $_POST['Name'];
$email = $_POST['email']; // Note: You didn't have an 'email' field in your form, I assume it's a typo and you meant 'Subject'
$message = $_POST['Message'];

// Validate form data
if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400); // Return a 400 Bad Request status code
    echo 'Please fill in all fields';
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400); // Return a 400 Bad Request status code
    echo 'Invalid email address';
    exit;
}

// Email settings
$to = 'your_email@example.com'; // Replace with your email address
$subject = 'New message from website';
$headers = [
    'From' => $name . ' <' . $email . '>',
    'Reply-To' => $email,
    'Content-Type' => 'text/html; charset=utf-8'
];

// Create email body
$body = "
<html>
<head>
    <title>New message from website</title>
</head>
<body>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Message:</strong> $message</p>
</body>
</html>
";

// Send email
if (mail($to, $subject, $body, implode("\r\n", $headers))) {
    http_response_code(200); // Return a 200 OK status code
    echo 'Message sent successfully!';
} else {
    http_response_code(500); // Return a 500 Internal Server Error status code
    echo 'Error sending message. Please try again later.';
}
?>