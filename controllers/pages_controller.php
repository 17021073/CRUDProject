<?php
    require_once 'models/Card.php';
    class PagesController {

        private $card;
        public function __construct(){
            $this->card = new Card();
        }

        // handler homepage
        public function home(){
            
            $cards = $this->card->getAllCard();
            
            require_once 'views/pages/home.php';
        }

        // handler error page
        public function error(){
            echo 'error page here';
        }

        // handler create page
        public function create(){
            $data = [
                'name'=>$_POST['name'],
                'description'=>$_POST['description'],
                'img'=>$_POST['image']
            ];
            if($data['name'] != ""){
                         
                $this->card->createCard($data);
                if($this->card){
                    echo '<script>alert("Card was saved.")</script>';
                }else {
                    echo '<script>alert("Unable to save this card")</script>';
                }
    
            }
            

            require_once 'views/pages/create.php';
        }

        // handler update page
        public function update(){
            if($_GET['id'] == ""){
                header('Location: http://localhost/CRUDProject/?controller=pages&action=error');
            }
            
           
            $row = $this->card->readCardByID($_GET['id']);
            $id = $_GET['id'];
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                $data = [
                    'id'=>$id,
                    'name'=>$_POST['name'],
                    'description'=>$_POST['description'],
                    'img'=>$_POST['image']
                ];

                if($this->card->updateCard($data)){
                    echo '<script>alert("Card was updated.")</script>';
               
                }else {
                    echo '<script>alert("Unable to update card.")</script>';
                }
            }
       

            require_once 'views/pages/update.php';
        }

        // handler read detail card
        public function read(){
            if($_GET['id'] == ""){
                header('Location: http://localhost/CRUDProject/?controller=pages&action=error');
            }
            $id = $_GET['id'];
            $row = $this->card->readCardByID($id);

            require_once 'views/pages/read.php';
        }

        // handler delete card
        public function delete(){
            if($_GET['id'] == ""){
                header('Location: http://localhost/CRUDProject/?controller=pages&action=error');
            }
            $id = $_GET['id'];
            if($this->card->deleteCard($id)){
                header('Location: http://localhost/CRUDProject/?controller=pages&action=home');
                
            }else {
                header('Location: http://localhost/CRUDProject/?controller=pages&action=error');
            }
            


        }
    }
?>