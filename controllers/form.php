<?php


    class Form extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->message = "";     
            $this->view->questions = [];
            $this->view->categories = [];
            $this->view->form = [];
              
        }

        function render(){
            $this->view->render('form/index'); 
        }

        function verif(){       
            $this->pushForm();
        }

        function complete(){
            $this->pushResponses();
        }

        function end(){
            $this->pushComment();
        }

        function pushForm(){
            date_default_timezone_set('America/Bogota');

            $mail       = $_POST['mail'];
            $idnum      = $_POST['idnum'];
            $program    = $_POST['program'];
            $name       = $_POST['name'];
            $date       = date("Y-m-d H:i:s");  
            $message = "";

            if($this->model->insertFormDatas(['mail' => $mail, 'idnum' => $idnum, 'program' => $program, 'name' => $name, 'date' => $date])){
                $message = '<div class="jumbotron">
                                <h3>Nuevo formulario creado.</h3>
                                <a class="btn btn-success" href="'.constant("URL").'form/showQuiz/'.$idnum.'">Empezar la evaluación</a>
                            </div>';
                $this->view->message = $message;
                $this->render();
            }else{
                $message = '<div class="jumbotron"><h3>Ya usted ha hecho este formulario.</h3></div>';
                $this->view->message = $message;
                $this->render();
            }
        }

        function pushResponses(){

            session_start();

            $this->listQuestion();
            $this->listCategories();
            $this->listTypes();

            $message = "";
            $i = 0;

            include_once 'models/categoryClass.php';
            include_once 'models/formClass.php';
            include_once 'models/responseClass.php';
            
            foreach ($this->view->categories as $row) {
                $category = new QCategory();
                $category = $row;

                include_once 'models/questionClass.php';

                foreach ($this->view->questions as $row) {
                    $question = new Question();
                    $question = $row;
                    
                    if ($question->category == $category->id) {
                        if ($question->type == 1){

                            $value        = $_POST['response'.$i];
                            $id_question  = $question->id;
                            $id_form      = $_SESSION['id_CurrentForm'];
                            $this->model->insertResponseDatas(['value' => $value, 'id_question' => $id_question, 'id_form' => $id_form]);
                            
                            $i++;
                        }else if ($question->type == 2){
                            $value          = $_POST['response'.$i];
                            $id_question    = $question->id;
                            $id_form        = $_SESSION['id_CurrentForm'];
                            $this->model->insertResponseDatas(['value' => $value, 'id_question' => $id_question, 'id_form' => $id_form]);
                            
                            $i++;
                        }
                    }
                }
            }
            $this->showCommentStep($_SESSION['id_CurrentForm']);
        }

        function pushComment(){

            session_start();

            $value          = $_POST['comment'];
            $id_form        = $_SESSION['id_CurrentForm']; 
            $message = "";

            if($this->model->insertCommentDatas(['value' => $value, 'id_form' => $id_form])){
                $this->view->render('form/end');
                session_destroy();
                return true;
            }else{
                return false;
            }
        }

        function showQuiz($param = null){
            $idForm = $param[0];
            $form = new FormClass();
            $form = $this->model->get_formByIdnum($idForm);
            
            session_start();
            $_SESSION['id_CurrentForm'] = $form->id;
            $this->view->form = $form;
            $this->view->message = '';
            $this->listQuestion();
            $this->listCategories();
            $this->listTypes();
            $this->view->render('form/quiz');
        }

        function showCommentStep($param=null){
            $this->view->message = '';
            $this->view->render('form/commentStep');
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