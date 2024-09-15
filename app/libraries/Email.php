

<?php

class Email extends Controller{


    public function __construct(){
        $this->scheduledEmailModel = $this->model('ScheduledEmail');
    }
    




    public function scheduleEmail($data){
        return $this->scheduledEmailModel->addMailData($data);
    }


    
    public static function sendEmail($data){

          //Create an instance; passing `true` enables exceptions
          $mail = new PHPMailer(true);

          try {
              //Server settings
              $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = SMTP_HOST;                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = SMTP_USERNAME;                     //SMTP username
              $mail->Password   = SMTP_PASSWORD;                               //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = SMTP_PORT;            
              

              //Recipients
              $mail->setFrom(SMTP_USERNAME);

              $mail->addAddress($data->recipient_email, 'Test Email');     //Add a recipient
            //  $mail->addAddress('ellen@example.com');               //Name is optional
           //   $mail->addReplyTo('info@example.com', 'Information');
            //  $mail->addCC('cc@example.com');
            //  $mail->addBCC('bcc@example.com');

        
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = $data->subject;
              $mail->Body    = $data->body;

             return $mail->send();

              


             // echo 'Message has been sent';
          } catch (Exception $e) {

                return false;

             // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }





        
    }


}