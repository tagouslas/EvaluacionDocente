<?php 

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
                var_dump($query);
                return true;
            } catch (PDOException $err) {
                return false;
                print_r($err);
            }
            
            


        }
    }
?>