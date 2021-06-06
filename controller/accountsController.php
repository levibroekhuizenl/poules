<?php
require_once '../model/accountsLogic.php';
class MatchesController {
        //properties
        public $matches;

        //methods
        function __construct() {
            $this->AccountsLogic = new MatchesLogic();
        }

        function handleRequest() {
            try {

                if(isset($_REQUEST['todo'])){
                    $todo = $_REQUEST['todo'];
                }else {
                    $todo = 'default';
                }

                switch ($todo) {
                    case 'createform':
                        break;
                    case 'register':
                        $username = $_REQUEST['username'];
                        $password = $_REQUEST['psw'];
                        $confirm_password = $_REQUEST['psw-repeat'];
                        if($password == $confirm_password){

                        }else {
                            echo 'wachtwoorden komen niet overeen';
                        }
                        $this->collectCreateAccount($username, $password);
                        echo '<h1 class="title"> Account aangemaakt </h1>';
                        break;
                    case 'read':
                        $this->collectreadAllmatches();
                        break;
                    case 'update':
                        $this->collectUpdateProduct($id, $product_name, $price, $desc);
                        break;
                    case 'reads':
                        $this->collectreadAllmatches();
                        break;
                    case 'updateform':
                        $this->collectReadProduct($id);
                        include '../view/update.php';
                        break;
                    case 'search':
                        $res = $_REQUEST['search'];
                        $this->collectSearchMatch($res);
                        break;
                    case 'delete':
                        $this->collectDeleteProduct($_REQUEST['id']);
                        echo 'verwijderd';
                        break;
                    default:
                        $this->collectReadMatches();
                        break;
                }

            }catch (Exeption $e){
                throw $e;
            }
        }

        function collectReadMatches() {
            $matches = $this->MatchesLogic->readMatches();
            include '../view/matches.php';
        }

         public function collectSearchMatch($res) {
            $matches = $this->MatchesLogic->searchMatch($res);
        }

        function collectCreateAccount($username, $password) {
            $matches = $this->AccountsLogic->createAccount($username, $password);
        }

        function collectUpdateProduct($id, $product_name, $price, $desc) {
           $matches = $this->matchesLogic->updateProduct($id, $product_name, $price, $desc);
            include '../view/read.php';
        }

        function collectDeleteProduct($id) {
            $matches = $this->matchesLogic->deleteProduct($id);
        }

        function collectSearchProduct($res) {
            $matches = $this->matchesLogic->searchProduct($res);
        }

        function __destruct() {
            $this->conn = null;
        }
    }
$new = new MatchesController();
$new->handleRequest();
?>