<?php
    class Database {
        private $host = "localhost";
        private $db_name = "mini_project_db";
        private $username = "root";
        private $password = "123456";
       
        private $dbConn;
        private $statement;
       
        public function __construct(){
            $conn = 'mysql:host='.$this->host. ';dbname='.$this->db_name;
            try{
      
                $this->dbConn = new PDO($conn, $this->username, $this->password);

            }catch(PDOException $e){
                echo "Connection error: ".$e->getMessage();
            }
            
        }

        // prepare cau lenh sql
        public function query($query){
           
            $this->statement = $this->dbConn->prepare($query);
         
        }

        // bind value to sql 
        public function bind($parameter, $value){
       
            $this->statement->bindParam($parameter, $value);
        }

        // thuc thi cau query
        public function execute(){
            if($this->statement->execute()){
                return true;
            }else {
                return false;
            }
        }

        // row count 
        public function rowCount(){
            return $this->statement->rowCount();
        }

        // return detail row as a object
        public function rowDetail(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        public function fetchAll(){
            return $this->statement->fetchAll();
        }

    }
?>