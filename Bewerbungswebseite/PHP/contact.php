<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $user_email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "info@maxheess.de";  
    $subject = "Neue Nachricht von deiner Bewerbungswebseite";
    
    $body = "<html><body>";
    $body .= "<h2>Neue Nachricht</h2>";
    $body .= "<p><strong>Name:</strong> $name</p>";
    $body .= "<p><strong>E-Mail:</strong> $user_email</p>";
    $body .= "<p><strong>Nachricht:</strong><br>$message</p>";
    $body .= "</body></html>";
    
    $headers = "From: info@maxheess.de\r\n"; 
    $headers .= "Reply-To: $user_email\r\n"; 
    $headers .= "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=UTF-8\r\n"; 
    
    if (mail($to, $subject, $body, $headers)) {
        header("Location: ../HTML/danke.html");
        exit;
    } else {
        echo "Entschuldigung, es gab ein Problem beim Versenden Ihrer Nachricht.";
    }
}
?>