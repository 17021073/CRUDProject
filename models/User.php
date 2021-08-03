<?php
    require_once 'connection.php';
    class User {
        private $db;
        public function __construct(){
            $this->db = new Database();
        }

        public function login($username, $password){
            $query = "SELECT * FROM users WHERE name=?";
            // prepare query
            $this->db->query($query);

            // bind value
            $this->db->bind(1, $username);

            $row = $this->db->rowDetail($data);
            $hashedPass = $row->password;
           
            if(password_verify($password, $hashedPass)){
                return $row;
            }else {
                return false;
            }
        }

        // find user email from db
        public function findUserEmail($email){
            $query = "SELECT email FROM users WHERE email=?";
            // prepare query
            $this->db->query($query);

            // bind value
            $this->db->bind(1, $email);
            $this->db->execute();

            if($this->db->rowCount() > 0){
                return true;
            }else {
                return false;
            }
        }

        // find user name from db
        public function findNameUser($name){
            $query = "SELECT name FROM users WHERE name=?";
            // prepare query
            $this->db->query($query);

            // bind value
            $this->db->bind(1, $name);
            $this->db->execute();

            if($this->db->rowCount() > 0){
                return true;
            }else {
                return false;
            }
        }

        // hadler register
        public function register($data){
            // sql to insert user to db
            $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
     
            // prepare sql
            $this->db->query($query);

            // bind value
            $this->db->bind(1, strtolower($data['username']));
            $this->db->bind(2, $data['email']);
            $this->db->bind(3, $data['password']);
          
            // execute query
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
     
        }
    }

?>