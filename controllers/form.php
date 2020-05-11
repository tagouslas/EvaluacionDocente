<?php

    class Form extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->message = "";      
            $this->view->questions = [];   
        }

        function render(){
           
            //$this->get_questions();
            $this->get_qcategories();
            //$this->get_qtypes();
            $this->view->render('form/index'); 
        }

        function firstStep(){
            
            $mail       = $_POST['mail'];
            $idnum      = $_POST['idnum'];
            $program    = $_POST['program'];
            $name       = $_POST['name'];
            $date       = date("Y-m-d");
             
            $message = "";

            if($this->model->insert(['mail' => $mail, 'idnum' => $idnum, 'program' => $program, 'name' => $name, 'date' => $date])){
                $message = "Nuevo formulario creado";
            }else{
                $message = "Ya usted ha hecho este formulario.";
            }

            $this->view->message = $message;
            $this->render();
        }

        function get_questions(){
            $questions = $this->model->get_questions();
            $this->view->questions = $questions;           
        }

        function get_qcategories(){
            $qcategories = $this->model->get_qcategories();
            $this->view->qcategories = $qcategories;
            
        }

        function get_qtypes(){
            $qtypes = $this->model->get_qtypes();
            $this->view->qtypes = $qtypes;           
        }
    }
?>