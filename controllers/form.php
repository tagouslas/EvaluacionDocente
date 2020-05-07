<?php

    class Form extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->render('form/index');
            
        }

        function firstStep(){
            
            $mail       = $_POST['mail'];
            $idnum      = $_POST['idnum'];
            $program    = $_POST['program'];
            $name       = $_POST['name'];
            $date       = date("Y-m-d");
            

            if($this->model->insert(['mail' => $mail, 'idnum' => $idnum, 'program' => $program, 'name' => $name, 'date' => $date])){
                echo 'Primer paso acceptado.';
            }else{
                echo '<br>Error of insertion.';
            }
        }
    }
?>