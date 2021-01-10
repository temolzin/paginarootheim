<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../../assets/vendor/phpmailer/src/PHPMailer.php';
require '../../assets/vendor/phpmailer/src/Exception.php';
require '../../assets/vendor/phpmailer/src/SMTP.php';

class SendEmailController
{
    /*Función para envíar el correo al cliente confirmando que se recibió correctamente su mensaje*/
    function sendemailclient($arrayData)
    {
        $name = $arrayData['name'];
        $email = $arrayData['email'];
        $phone = $arrayData['phone'];
        $subject = $arrayData['subject'];
        $mesagge = $arrayData['message'];

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'mail.rootheim.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'info@rootheim.com';                     // SMTP username
            $mail->Password = 'aG1rGvFBClB4qZ';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';

            //Código para agregar una imagen y después se manda a llamar con <img src=""/>
            $mail->AddEmbeddedImage('../../assets/img/logoroot.png', 'emailimg', 'attachment', 'base64', 'image/png');
            $mail->AddEmbeddedImage('../../assets/img/favicon.png', 'favicon', 'attachment', 'base64', 'image/png');

            //Recipients
            $mail->setFrom('info@rootheim.com');
            $mail->addAddress($email);

            $html = '';
            $html .= '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="utf-8">
                    <link rel="icon" href="img/favicon.png" type="image/png" />
                    <title>Root Heim Company</title>
                </head>
                <body style="background-color: white; ">
                
                <!--Copia desde aquí-->
                <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 0">
                            <a href="https://www.rootheim.com">
                                <img src="cid:emailimg" class="img-logo" />
                            </a>
                        </td>
                    </tr>
                
                    <tr>
                        <td style="background-color: #ecf0f1">
                            <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                                <h2 style="color: #ff3f63; margin: 0 0 7px">¡Hola, '.$name.'!</h2><br>
                                <p style="margin: 2px; font-size: 15px">
                                    Hemos recibido tu mensaje correctamente <br>
                                    Trataremos de darte una respuesta lo más antes posible
                                    
                                    <br>
                                    <br>
                                    <br>
                                    Recuerda que ofrecemos diferentes servicios:
                                </p>
                                <ul style="font-size: 15px;  margin: 10px 0">
                                    <li>Capacitación en distintos sectores de Tecnologías de la Información</li>
                                    <li>Administración de Servidores (Linux/Windows)</li>
                                    <li>Desarrollo de Software a Medida</li>
                                    <li>Desarrollo de Páginas Web</li>
                                    <li>y más...</li>
                                </ul>
                                <br>
                                <p style="margin: 2px; font-size: 15px; text-align: center">
                                    Gracias por tu preferencia
                                </p><br>
                                <div style="width: 100%; text-align: center">
                                    <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db" href="https://www.rootheim.com">Visitanos</a>
                                </div>
                                <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0"> Copyright &copy; <img width="16px" height="16px" src="cid:favicon"> Root Heim 2021</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <!--hasta aquí-->
                
                </body>
            </html>';

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Message received: ' . $subject;
            $mail->Body = $html;

            $mail->send();
            echo 'ok';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    /*Función para envíar el correo a la empresa*/
    function sendemaiself($arrayData)
    {
        $name = $arrayData['name'];
        $email = $arrayData['email'];
        $phone = $arrayData['phone'];
        $subject = $arrayData['subject'];
        $mesagge = $arrayData['message'];

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'mail.rootheim.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'info@rootheim.com';                     // SMTP username
            $mail->Password = 'aG1rGvFBClB4qZ';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';

            //Código para agregar una imagen y después se manda a llamar con <img src=""/>
            $mail->AddEmbeddedImage('../../assets/img/logoroot.png', 'emailimg', 'attachment', 'base64', 'image/png');
            $mail->AddEmbeddedImage('../../assets/img/favicon.png', 'favicon', 'attachment', 'base64', 'image/png');
            //Recipients
            $mail->setFrom($email);
            $mail->addAddress('info@rootheim.com');
            $html = "";

            $html .= '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="utf-8">
                    <link rel="icon" href="img/favicon.png" type="image/png" />
                    <title>Root Heim Company </title>
                </head>
                <body style="background-color: black ">
                
                <!--Copia desde aquí-->
                <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                
                    <tr>
                        <td style="padding: 0">
                            <a href="https://www.rootheim.com">
                                <img style="padding: 0; display: block; alignment: center;" src="cid:emailimg" width="50%">
                            </a>
                        </td>
                    </tr>
                
                    <tr>
                        <td style="background-color: #ecf0f1">
                            <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                                <h2 style="color: #ff3f63; margin: 0 0 7px">¡Hola, Root Heim!</h2><br>
                                <i style="margin: 2px; font-size: 15px">
                                    Un Cliente ha envíado un correo por medio de la página web <i><a href="https://www.rootheim.com">ROOTHEIM</a></i>
                                    <br>
                                    <br>
                                    <br>
                                    Los datos que contiene son:
                                </p>
                                <ul style="font-size: 15px;  margin: 10px 0">
                                    <li>Email: '. $email .'</li>
                                    <li>Teléfono: '. $phone .'</li>
                                    <li>Asunto: '. $subject .'</li>
                                    <li>Mensaje: '. $mesagge .'</li>
                                </ul>
                                <br>
                                <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0"> Copyright &copy; <img src="cid:favicon" width="4%"> Root Heim 2021</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <!--hasta aquí-->
                
                </body>
            </html>';

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject . " " . $name;
            $mail->Body = $html;

            $mail->send();
            echo 'ok';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}