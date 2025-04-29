<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $your_email = "your@email.com"; // <- Change this to your email
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Email to you
    $subject = "New Contact From Portfolio Site";
    $email_content = "Name: $name\nEmail: $email\nMessage:\n$message";
    $email_headers = "From: $email";

    mail($your_email, $subject, $email_content, $email_headers);

    // Auto-reply to sender
    $subject_reply = "Thanks for reaching out!";
    $message_reply = "Hi $name,\n\nThank you for contacting me about woodworking! I'll get back to you soon.\n\n- My Woodworking";
    $headers_reply = "From: $your_email";

    mail($email, $subject_reply, $message_reply, $headers_reply);

    // Redirect to a Thank You page (optional)
    header("Location: thank_you.html");
    exit;
}
?>
