

<?php

class Users extends Controller{

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    
        
    public function index(){
        if(isLoggedIn()){
          redirect('email');
        }
        $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => ''
           
        ];
        $this->view('users/login', $data);
      }


    public function register(){
        ///// check for POST
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //// process form

            //////// Sanitize the POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            ///// init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            //// Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email has been taken';
                }
            }

            //// Validate name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            /////// Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

           

            ///////// Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err'])){
                ////// Validated

               /// Hash password
               $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

               if($this->userModel->register($data)){
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
               }else{
                   die('Something went wrong');
               }

            }else{
                //// Load views with error
                $this->view('users/register', $data);
            }

        }else{
            ///// load form
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/register', $data);
        }
    }


    public function login(){
        ///// check for POST
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //// process form

            //////// Sanitize the POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            ///// init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            //// Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }else{
                if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = 'please enter a valid email';
                }else{
                    $data['email_err'] = '';
                }
            }

            /////// Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            ///// check email/user
            if($this->userModel->findUserByEmail($data['email'])){

            }else{
                $data['email_err'] = 'no user found';
            }


            ///////// Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
                ////// Validated
                //die("SUCCESS");

                //////Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    //// Create session
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = 'password incorrect';
                    $this->view('users/login', $data);
                }

            }else{
                //// Load views with error
                $this->view('users/login', $data);
            }


        }else{
            ///// load form
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
               
            ];

            $this->view('users/login', $data);

        }
    }


    public function createUserSession($user){
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('email');
    }

    public function logout(){
        session_start();
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);

        session_destroy();
        redirect('users/login');
    }

   

}


?>