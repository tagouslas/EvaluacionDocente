<?php


    class Form extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->message = "";
            $this->view->next = "";      
            $this->view->questions = [];
            $this->view->currentFormID = 0;   
        }

        function render(){
           
            $this->listQuestion();
            $this->listCategories();
            $this->listTypes();
            $this->view->render('form/index'); 
        }

        function complete(){       
            $currentForm = new FormClass();
            $currentForm = $this->model->get_formByIdnum($this->pushForm());
            $this->view->currentFormID = $currentForm->id;
        }

        function pushForm(){
            
            $mail       = $_POST['mail'];
            $idnum      = $_POST['idnum'];
            $program    = $_POST['program'];
            $name       = $_POST['name'];
            $date       = date("Y-m-d");
             
            $message = "";

            if($this->model->insertFormDatas(['mail' => $mail, 'idnum' => $idnum, 'program' => $program, 'name' => $name, 'date' => $date])){
                $message = '<div class="jumbotron"><h3>Nuevo formulario creado </h3></div>';
                $next = '<input type="button"  class="next btn btn-info" value="Next" />';
                
            }else{
                $message = '<div class="jumbotron"><h3>Ya usted ha hecho este formulario.</h3></div>';
            }
            
            

            $this->view->message = $message;
            $this->view->next = $next;
            $this->render();

            return $idnum;
        }

        function get_CurrentFormID(){
            
        }

        
        function listQuestion(){
            $questions = $this->model->get_questions();
            $this->view->questions = $questions;           
        }

        function listCategories(){
            $categories = $this->model->get_qcategories();
            $this->view->categories = $categories;           
        }

        function listTypes(){
            $types = $this->model->get_qtypes();
            $this->view->types = $types;           
        }
    }
?>