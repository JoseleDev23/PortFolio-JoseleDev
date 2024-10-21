<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Validar el correo electrónico
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Aquí puedes configurar el correo electrónico
        $to = "joseamsarmiento@gmail.com"; // Cambia esto por tu dirección de correo
        $subject = "New Contact Form Submission from $name";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for your message, $name. It has been sent.";
        } else {
            echo "Sorry, there was an error sending your message. Please try again.";
        }
    } else {
        echo "Please enter a valid email address.";
    }
} else {
    echo "Invalid request method.";
}
