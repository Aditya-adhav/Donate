<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $amount = $_POST["amount"];
    $currency = $_POST["currency"];
    $message = $_POST["message"];
    
    // Prepare email content
    $to = $email;
    $subject = "Donation Invoice";
    $message = "Dear $name,\n\nThank you for your donation of $amount $currency.\n\nMessage: $message\n\nRegards,\nYour Organization";
    $headers = "From: your_organization@example.com";
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your donation! An invoice has been sent to your email.";
    } else {
        echo "Failed to send invoice. Please try again later.";
    }
} else {
    // Redirect to the donation form page if accessed directly
    header("Location: index.html");
    exit;
}
?>
