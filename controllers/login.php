<?php 
    class Login extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->message = '';
            
        }

        function render()
        {
            $this->view->render('login/index');
        }

        function verifUser(){
    
            $login    = $_POST['login'];
            $password = $_POST['password'];
            $message  = "";

            if($this->model->userExists(['login' => $login, 'password' => $password])){
                $message = "This user exists.";
                $this->view->message = $message;
                $this->render();
            }else{
                $message = "This user doesn't exists.";
                $this->view->message = $message;
                $this->render();
            }

            
        }
    }
?>