<?php 

    include_once 'models/question.php';
    include_once 'models/qcategory.php';

    class FormModel extends Model
    {
        public function __construct(){
            parent::__construct();
        }

        public function insert($data){
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
        
    }
?>