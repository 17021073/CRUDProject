<?php
    require_once 'connection.php';
    class Card {  
       
        private $db;
        public function __construct(){
            $this->db = new Database();
        }

        // get all item
        public function getAllCard(){
            $query = "SELECT * FROM cards";
            // prepare sql 
            $this->db->query($query);
            
            // execute query
            $this->db->execute();

            $results = $this->db->fetchAll();

            // echo var_dump($results[0]['id']);
            return $results;

        }

        // insert cart to db
        public function createCard($data){
            // sql to insert card to db
            $query = "INSERT INTO cards (name, description, img) VALUES(?, ?, ?)";

            // prepare sql
            $this->db->query($query);

            // bind value
            $this->db->bind(1, $data['name']);
            $this->db->bind(2, $data['description']);
            $this->db->bind(3, $data['img']);

            if($this->db->execute()){
                return true;
                
            }else {
                return false;
              
            }
        }

        // read one card info
        public function readCardByID($id){
            $query = "SELECT id, name, description, img FROM cards WHERE id=? LIMIT 0,1";

            // prepare sql
            $this->db->query($query);

            // bind value 
            $this->db->bind(1, $id);

            return $this->db->rowDetail();

        }

        // update card
        public function updateCard($data){
            $query = "UPDATE cards SET name=?, description=?, img=? WHERE id=?";

            // prepare sql
            $this->db->query($query);

            // bind value
            $this->db->bind(1, $data['name']);
            $this->db->bind(2, $data['description']);
            $this->db->bind(3, $data['img']);
            $this->db->bind(4, $data['id']);

            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }

        // delete card from db
        public function deleteCard($id){
            $query = "DELETE FROM cards WHERE id=?";

            // prepare query 
            $this->db->query($query);

            // bind value
            $this->db->bind(1, $id);

            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }


        
    }
?>