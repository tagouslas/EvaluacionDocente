<?php 

    include_once 'models/userClass.php';

    class LoginModel extends Model
    {
        public function __construct(){
            parent::__construct();
        }

        public function setUser($user){

        }

        public function userExists($data){
            $md5pass = md5($data['password']);

            var_dump($data['login']);
            var_dump($md5pass);

            try {
                $query = $this->db->connect()->prepare('SELECT * FROM users WHERE login = :login AND password = :password;');
                $query->execute([
                    'login'      => $data['login'], 
                    'password'   => $md5pass
                ]);
                
                if ($query->rowCount()) {
                    return true;
                }else {
                    return false;
                }

            } catch (PDOException $err) {
                return false;
                print_r($err);
            }
        }
        
        
    }
?>