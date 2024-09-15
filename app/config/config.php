

<?php

    //////DATABASE SETTINGs Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'cdlp');

    //// APP Root
    define('APPROOT', dirname(dirname(__FILE__)));

    
    ///// reall Root ///////
    define('DEFAULTROOT', dirname(dirname(dirname(__FILE__))));

    ////URL ROOT
    define('URLROOT', 'http://localhost/cdlp');

    ////// SITE Name
    define('SITENAME', 'cdlp');




    ///// Email SMTP Config //////
    define('SMTP_HOST', 'smtp.gmail.com');
    define('SMTP_PORT', 465);
    define('SMTP_USERNAME', 'christinotochukwu@gmail.com');
    // define('SMTP_PASSWORD', 'eqxgybgpsvzxnnqi');
    define('SMTP_PASSWORD', 'eqxgybgpsvzxnn');

    define('SMTP_SECURE', 'tls');





    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    // $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'christinotochukwu@gmail.com';                     //SMTP username
    // $mail->Password   = 'eqxgybgpsvzxnnqi';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 465;     





    

// ## EmailService Integration Configuration
// spring.mail.host=smtp.gmail.com
// spring.mail.port=465
// spring.mail.username=christinotochukwu@gmail.com
// spring.mail.password=eqxgybgpsvzxnnqi
// spring.mail.properties.mail.smtp.auth=true
// spring.mail.properties.mail.smtp.starttls.enable=true
// spring.mail.properties.mail.smtp.ssl.enable= true
