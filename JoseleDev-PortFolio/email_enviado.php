<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Email Sent Confirmation Page">
    <meta name="author" content="Jose Antonio Munoz Sarmiento">
    <link rel="icon" href="images/favicon.png">

    <title>Email Sent - JoseleDev</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background-color: #B968C7;
            display: flex;
            flex-direction: column;
            /* Cambiado a columna */
            justify-content: space-between;
            /* Espacio entre los elementos */
            align-items: center;
            /* Alineación centrada */
            height: 100vh;
            /* Altura completa de la vista */
            margin: 0;
            /* Sin margen */
        }

        .confirmation-container {
            text-align: center;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex-grow: 1;
            /* Esto hace que el contenedor de la confirmación ocupe el espacio disponible y empuje el footer hacia abajo */
        }

        .confirmation-container h1 {
            font-size: 2rem;
            color: #B968C7;
        }

        .confirmation-container p {
            margin-top: 10px;
            font-size: 1.1rem;
            color: #333;
            /* Cambiado a un color oscuro */
        }

        .confirmation-container .btn {
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .confirmation-container .btn:hover {
            background-color: #0056b3;
        }

        /* Estilos del footer */
        .footer {
            background-color: #fff;
            width: 100%;
            padding: 20px 0;
            text-align: center;
        }

        .footer p {
            color: #333;
            margin: 0;
            text-align: center;
            font-size: 1rem;
        }
    </style>
</head>

<body>

    <div class="confirmation-container">
        <h1><i class="fas fa-check-circle"></i> Email Sent</h1>
        <p>"Your email has been successfully sent. Thank you for considering my profile. <br>
            I would be happy to hear about any potential collaboration opportunities."
        </p>
        <a href="index.html" class="btn">Go Back to Portfolio</a>
    </div>

    <!-- FOOTER -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <p class="copyright-text text-center">Copyright &copy; 2024. All rights reserved</p>
                    <p class="copyright-text text-center"> This PortFolio is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a rel="nofollow" href="https://www.linkedin.com/in/joseledev/"> JoseleDev</a></p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>