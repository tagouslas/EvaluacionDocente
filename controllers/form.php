<?php

    class Form extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->message = "";         
        }

        function render(){
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
    }
?>