<?php

    date_default_timezone_set('Africa/Lagos');

    require_once('C:\xampp\htdocs\cdlp\app\bootstrap.php');
    require_once('C:\xampp\htdocs\cdlp\app\helpers\func_helper.php');
    require_once('C:\xampp\htdocs\cdlp\app\models\ScheduledEmail.php');
    require_once('C:\xampp\htdocs\cdlp\app\libraries\Email.php');

    $scheduleEmail = new ScheduledEmail();
    $data = $scheduleEmail->getPendingEmails();
    $failed_data = $scheduleEmail->getFailedEmails();

    foreach ($data as $value) {
        # code...
        if(getTimeDifference($value->scheduled_time)){
            if($value->attempts <= 3){
                if(Email::sendEmail($value)){
                    $value->status = 'success';
                    $value->attempts = $value->attempts + 1;
                    $scheduleEmail->updateScheduledEmail($value);
                }else{
                    $value->attempts = $value->attempts + 1;
                    $scheduleEmail->updateScheduledEmail($value);
                }
            }else{
                $value->status = 'failed';
                $scheduleEmail->updateScheduledEmail($value);
            }
        }
    }








