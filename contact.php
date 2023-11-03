<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Recipient email address
    $to = "sanjay01.cs@gmail.com"; // Change this to your email address

    // Set headers
    $headers = "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Compose the email message
    $email_message = "Name: $name<br>";
    $email_message .= "Email: $email<br>";
    $email_message .= "Subject: $subject<br>";
    $email_message .= "Message:<br>$message<br>";

    // SMTP configuration
    ini_set("SMTP", "smtp.gmail.com");
    ini_set("smtp_port", "587");
    ini_set("sendmail_from", "sanjay01.cs@gmail.com");
    ini_set("sendmail_path", "C:\xampp\sendmail\sendmail.exe -t -i -Xssl");

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        // Email sent successfully
        echo "Success! Your message has been sent.";
    } else {
        // Email sending failed
        echo "Error: Unable to send your message.";
    }
} else {
    // If the request method is not POST, redirect or display an error message.
    echo "Invalid request method.";
}
?>
