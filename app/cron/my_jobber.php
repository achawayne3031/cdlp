<?php

    date_default_timezone_set('Africa/Lagos');

 
    //////Core Libraries //////
    spl_autoload_register(function($className){
        require_once 'C:\xampp\htdocs\cdlp\app\libraries/' . $className . '.php';
    });


    require_once('C:\xampp\htdocs\cdlp\app\config/config.php');
    require_once('C:\xampp\htdocs\cdlp\app\helpers\func_helper.php');
    require_once('C:\xampp\htdocs\cdlp\app\models\ScheduledEmail.php');
    require_once('C:\xampp\htdocs\cdlp\app\libraries\Email.php');


    $scheduleEmail = new ScheduledEmail();
    $data = $scheduleEmail->getPendingEmails();

    if(count($data) > 0){ 
        foreach ($data as $value) {
            # code...
            if(getTimeDifference($value->scheduled_time)){
                if($value->attempts <= 3){
                    $value->attempts = $value->attempts + 1;

                    if(Email::sendEmail($value)){
                        $value->status = 'success';
                        $scheduleEmail->updateScheduledEmail($value);
                    }else{
                        $scheduleEmail->updateScheduledEmail($value);
                    }
                }else{
                    $value->status = 'failed';
                    $scheduleEmail->updateScheduledEmail($value);
                }
            }
        }
    }








