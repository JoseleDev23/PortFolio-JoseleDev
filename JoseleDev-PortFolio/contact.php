<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Incluir PHPMailer
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer();

try {
    // Configurar el servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.servidor-correo.net'; // Cambia esto por tu servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'info@joseledev.es'; // Cambia esto por tu dirección de correo SMTP
    $mail->Password = ''; // Cambia esto por tu contraseña de correo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilitar encriptación TLS
    $mail->Port = 587; // Puerto SMTP

    // Configurar remitente y destinatario
    $mail->setFrom('info@joseledev.es', 'PortFolio'); // Remitente
    $mail->addAddress('info@joseledev.es', 'Josele Dev'); // Primer destinatario
    $mail->addAddress('joseamsarmiento@gmail.com', 'José Antonio'); // Segundo destinatario

    // Escapar y validar las variables de solicitud
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $phone = htmlspecialchars(strip_tags($_POST['phone']));
    $message = htmlspecialchars(strip_tags($_POST['message']));

    // Validar campos obligatorios
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        header('Location: email_no_enviado.php?error=Todos los campos deben estar llenos.');
        exit;
    }

    // Validar formato de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: email_no_enviado.php?error=Formato de email inválido.');
        exit;
    }

    // Configurar el contenido del correo
    // Configurar el contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Tienes un mensaje de tu Porfolio.';
    $mail->Body = "<!DOCTYPE html>
                        <html lang='en'>
                        <head>
                            <meta charset='UTF-8'>
                            <title>Correo de Consulta</title>
                            <style>
                                body { font-family: Arial, sans-serif; }
                                table { width: 100%; }
                                .centered { text-align: center; }
                                .info { margin-top: 20px; }
                            </style>
                        </head>
                        <body>
                            <table>
                                <thead>
                                    <tr>
                                        <td class='centered' colspan='2'>
                                            <a href='#'>
                                                <img src='https://40929275.servicio-online.net/images/project/logoemail.png' alt='Logo de PortFolio'>
                                            </a>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class='info' style='border:none;'><strong>Nombre:</strong> $name</td>
                                        <td class='info' style='border:none;'><strong>Email:</strong> $email</td>
                                    </tr>
                                    <tr>
                                        <td class='info' style='border:none;'><strong>Teléfono:</strong> $phone</td>
                                    </tr>
                                    <tr>
                                        <td class='info' colspan='2' style='border:none;'>$message</td>
                                    </tr>
                                </tbody>
                            </table>
                        </body>
                        </html>";

    // Enviar el correo electrónico
    if ($mail->send()) {
        // Redirigir a la página de éxito si el correo se envió correctamente
        header('Location: email_enviado.php');
        exit;
    } else {
        // Mostrar un mensaje de error si falla el envío del correo
        header('Location: email_no_enviado.php?error=Hubo un error al enviar el mensaje.');
    }
} catch (Exception $e) {
    header("Location: email_no_enviado.php?error=Error de PHPMailer: {$mail->ErrorInfo}");
}
