
<?php

    class EmailController extends Controller{

        public function __construct(){
            $this->scheduledEmailModel = $this->model('ScheduledEmail');
        }
        

        
        public function index(){
          if(!isLoggedIn()){
            redirect('usersController/login');
          }

          $scheduledEmail = $this->scheduledEmailModel->getScheduledEmails();

          $data = [
              'scheduledEmail' => $scheduledEmail
          ];
          $this->view('email/index', $data);
        }

        

        public function add(){
            ///// check for POST
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                //// process form

                //////// Sanitize the POST
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                ///// init data

                $data = [
                    'recipient_email' => trim($_POST['recipient_email']),
                    'subject' => $_POST['subject'],
                    'body' => $_POST['body'],
                    'scheduled_time' => $_POST['scheduled_time'],
                    'recipient_email_err' => '',
                    'subject_err' => '',
                    'body_err' => '',
                    'scheduled_time_err' => ''
        
                ];

              

                //// Validate Email address ///
                if(empty($data['recipient_email'])){
                    $data['recipient_email_err'] = 'Please enter recipient email address';
                }else{
                    if(!filter_var($data['recipient_email'], FILTER_VALIDATE_EMAIL)) {
                        $data['recipient_email_err'] = 'please enter a valid email';
                    }else{
                        $data['recipient_email_err'] = '';
                    }
                }


                //// Validate Subject ////
                if(empty($data['subject'])){
                    $data['subject_err'] = 'Please enter subject';
                }

                  //// Validate Body ////
                if(trim($data['body']) == ''){
                    $data['body_err'] = 'Please enter the body';
                }


                if(empty($data['scheduled_time'])){
                    $data['scheduled_time_err'] = 'Please enter schedule date and time';
                }


                ///////// Make sure errors are empty
                if(empty($data['recipient_email_err']) && empty($data['subject_err']) && empty($data['scheduled_time_err']) && empty($data['body_err'])){
                
                    /// Save ////
                    $email = new Email();
                    $addedMail = $email->scheduleEmail($data);

                    ////$addedMail = $this->scheduledEmailModel->addMailData($data);

                    if($addedMail){
                        flash('automated_message', 'Automated email notification has been added');
                        redirect('emailController');
                    }else{
                        flash('automated_message', 'Error occured during adding a new email notification');
                        redirect('emailController');
                    }
                }else{
                    //// Load views with error
                    $this->view('email/add', $data);
                }


            }else{
                ///// load form
                $data = [
                    'recipient_email' => '',
                    'subject' => '',
                    'body' => '',
                    'scheduled_time' => '',
                    'recipient_email_err' => '',
                    'subject_err' => '',
                    'body_err' => '',
                    'scheduled_time_err' => ''
                ];

                $this->view('email/add', $data);

            }
        }
    }


