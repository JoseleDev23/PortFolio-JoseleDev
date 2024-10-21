<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitización de datos
    $to = "joseamsarmiento@gmail.com"; // Tu correo
    $from = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $name = htmlspecialchars(strip_tags(trim($_REQUEST['name'])));
    $subject = htmlspecialchars(strip_tags(trim($_REQUEST['subject'])));
    $number = htmlspecialchars(strip_tags(trim($_REQUEST['number'])));
    $cmessage = htmlspecialchars(strip_tags(trim($_REQUEST['message'])));

    // Validación del correo electrónico
    if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
        // Cabeceras
        $headers = "From: $from\r\n";
        $headers .= "Reply-To: $from\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $emailSubject = "You have a message from your Bitmap Photography.";

        // Contenido del correo
        $logo = 'img/logo.png';
        $link = '#';

        $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
        $body .= "<table style='width: 100%;'>";
        $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
        $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
        $body .= "</td></tr></thead><tbody><tr>";
        $body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
        $body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
        $body .= "</tr>";
        $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>"; // Corrige el uso de $subject
        $body .= "<tr><td></td></tr>";
        $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
        $body .= "</tbody></table>";
        $body .= "</body></html>";

        // Enviar el correo
        $send = mail($to, $emailSubject, $body, $headers);

        // Mensaje de éxito o error
        if ($send) {
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
