<?php 

    include_once 'models/question.php';
    include_once 'models/qcategory.php';
    include_once 'models/qtype.php';
    include_once 'models/form.php';

    class FormModel extends Model
    {
        public function __construct(){
            parent::__construct();
        }

        public function insertFormDatas($data){
            try {
                $query = $this->db->connect()->prepare('INSERT INTO Forms (mail, identification_num, academic_program, submitter_name, created_at) VALUES(:mail, :idnum, :program, :name, :date);');
                $query->execute([
                    'mail'      => $data['mail'], 
                    'idnum'     => $data['idnum'], 
                    'program'   => $data['program'], 
                    'name'      => $data['name'],
                    'date'      => $data['date']
                ]);
                
                return true;
            } catch (PDOException $err) {
                return false;
                print_r($err);
            }
        }

        public function get_forms(){
            $items = [];

            try {
                
                $query = $this->db->connect()->query("SELECT * FROM Forms;");

                while ($row = $query->fetch()) {
                    $item = new FormClass();
                    $item->id = $row['id'];
                    $item->mail = $row['mail'];
                    $item->identification_num = $row['identification_num'];
                    $item->academic_program = $row['academic_program'];
                    $item->submitter_name = $row['submitter_name'];
                    $item->created_at = $row['created_at'];

                    array_push($items, $item);
                }

                return $items;

            } catch (PDOException $err) {
                return[];
            }
        }

        public function get_formByIdnum($idnum){
            try {
                $item = [];

                $query = $this->db->connect()->query("SELECT * FROM Forms WHERE identification_num = $idnum;");

                while ($row = $query->fetch()) {
                    $item = new FormClass();
                    $item->id = $row['id'];
                    $item->mail = $row['mail'];
                    $item->identification_num = $row['identification_num'];
                    $item->academic_program = $row['academic_program'];
                    $item->submitter_name = $row['submitter_name'];
                    $item->created_at = $row['created_at'];
                }

                if ($item == null) {
                    return 0;
                }else{
                    return $item;
                }

                

            } catch (PDOException $err) {
                return[];
            }
        }

        public function get_questions(){
            $items = [];

            try {
                
                $query = $this->db->connect()->query("SELECT * FROM Questions;");

                while ($row = $query->fetch()) {
                    $item = new Question();
                    $item->id = $row['id'];
                    $item->value = $row['value'];
                    $item->type = $row['type'];
                    $item->category = $row['category'];

                    array_push($items, $item);
                }

                return $items;

            } catch (PDOException $err) {
                return[];
            }
        }

        public function get_qcategories(){
            $items = [];

            try {
                
                $query = $this->db->connect()->query("SELECT * FROM Question_Categories;");

                while ($row = $query->fetch()) {
                    $item = new QCategory();
                    $item->id = $row['id'];
                    $item->value = $row['value'];

                    array_push($items, $item);
                }

                return $items;

            } catch (PDOException $err) {
                return[];
            }
        }

        public function get_qtypes(){
            $items = [];

            try {
                
                $query = $this->db->connect()->query("SELECT * FROM Question_Types;");

                while ($row = $query->fetch()) {
                    $item = new QType();
                    $item->id = $row['id'];
                    $item->value = $row['value'];

                    array_push($items, $item);
                }

                return $items;

            } catch (PDOException $err) {
                return[];
            }
        }
        
    }
?>