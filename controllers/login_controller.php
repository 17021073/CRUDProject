<?php
    session_start();
    require_once 'models/User.php';
    class LoginController {

        private $user;
        public function __construct(){
            $this->user = new User();
        }

        // handler login
        public function login(){
            
            
            $data = [
                'title'=>'Login',
                'username'=>'',
                'password'=>'',
                'usernameError'=>'',
                'passwordError'=>''
            ];
           

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
                $data=[
                    'username'=>$_POST['username'],
                    'password'=>$_POST['password'],
                    'usernameError'=>'',
                    'passwordError'=>''
                ];

                // validate username 
                if(empty($data['username'])){
                    $data['usernameError'] = 'Please enter username.';
                }

                // validate password
                if(empty($data['password'])){
                    $data['passwordError'] = 'Please enter password.';
                }

                // handle when have no error
                if(empty($data['usernameError']) && empty($data['passwordError'])){
                   
                    $loggedInUser = $this->user->login($data['username'], $data['password']);
                  
                    if($loggedInUser){

                        // set cookie
                        if(isset($_POST['remember'])){
                            // cookie exists 10min
                            setcookie('username', $data['username'], time()+ 60*10);
                            setcookie('password', $data['password'], time()+60*10);
                        }

                        // set session
                        session_start();
                        $_SESSION['id'] = $loggedInUser->id;
                        $_SESSION['username'] = $loggedInUser->name;
                        $_SESSION['email'] = $loggedInUser->email;
                        header('Location: '. 'http://localhost/CRUDProject/?controller=pages&action=home');
                        
                                    
                    }else {
                        // display message incorrect
                        $data['passwordError'] = 'Password or user name is incorrect. Please try again.';
                        require_once 'views/login/login.php';
                    }
                  
                }             

            } else {
                $data = [
                    'username'=>'',
                    'password'=>'',
                    'usernameError'=>'',
                    'passwordError'=>''
                ];
            }

            require_once 'views/login/login.php';
        }


        // handler signup
        public function signup(){

            $data = [
                'username'=>'',
                'email'=>'',
                'password'=>'',
                'confirmPassword'=>'',
                'nameError'=>'',
                'emailError'=>'',
                'passwordError'=>'',
                'confirmPasswordError'=>''
            ];

            // handle when user request signup
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
                $data = [
                    'username'=>$_POST['username'],
                    'email'=>$_POST['email'],
                    'password'=>$_POST['password'],
                    'confirmPassword'=>$_POST['confirmPassword'],
                    'nameError'=>'',
                    'emailError'=>'',
                    'passwordError'=>'',
                    'confirmPasswordError'=>''

                ];

                // validate username
                $nameValid = "/^[a-zA-Z0-9]*$/";
                if(empty($data['username'])){
                    $data['nameError'] = "Please enter username.";
                }else if(!preg_match($nameValid, $data['username'])){
                    $data['nameError'] = 'Name can only contain number and letter.';
                } else {
                    // check name exists
                    $name = strtolower($data['username']);
                    if($this->user->findNameUser($name)){
                        $data['nameError'] = 'Name is exists. Please enter another name.';
                    }
                }


                // validate email
               
                if(empty($data['email'])){
                    $data['emailError'] = 'Please enter email.' ;
                }else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                    $data['emailError'] = 'Please enter correct email.';
                } else {
                    // check email exists
                    if($user->findUserEmail($data['email'])){
                        $data['emailError'] = 'Email is exists. Please enter another email.';
                    }
                }

                // validate password
                
                if(empty($data['password'])){
                    $data['passwordError'] = 'Please enter password.';
                }else if(strlen($data['password']) < 6){
                    $data['passwordError'] = 'Password must have at least 6 characters.';
                }

                //validate confirm password
                if(empty($data['confirmPassword'])){
                    $data['confirmPasswordError'] = 'Please enter confirm password';
                }else {
                    if($data['password'] != $data['confirmPassword']){
                        $data['confirmPasswordError'] = 'Password not match, please try again.';
                    }
                }
              
                
           
                // handle after user click submit
                if(empty($data['nameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
                    // hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    if($this->user->register($data)){
                    
                        header('Location:'.'http://localhost/CRUDProject/?controller=login&action=login');
                      
                        
                    }else {
                        echo 'something went wrong';
                    }
                }

                
            }
            require_once 'views/login/signup.php';
        }


        // handler logout
        public function logout(){
            session_start();
            session_destroy();
            header('location:'. 'http://localhost/CRUDProject/?controller=pages&action=home');
    

        }
    }

?>