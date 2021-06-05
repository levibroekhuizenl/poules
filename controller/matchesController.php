<?php
// require_once '../model/outputdata.php';
class MatchesController {
        //properties
        public $matches;

        //methods
        function __construct() {
            // $this->matchesLogic = new matchesLogic();
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
                    case 'create':
                        $this->collectCreateProduct($service_name, $service_genre , $service_status, $service_details);
                        echo '<h1> aangemaakt </h1>';
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
                        $this->collectSearchProduct($res);
                        break;
                    case 'delete':
                        $this->collectDeleteProduct($_REQUEST['id']);
                        echo 'verwijderd';
                        break;
                    default:
                        echo 'test';
                        // $this->collectDeleteProduct();
                        break;
                }

            }catch (Exeption $e){
                throw $e;
            }
        }

        function collectCreateProduct($service_name, $service_genre , $service_status, $service_details) {
            $matches = $this->matchesLogic->createProduct($service_name, $service_genre , $service_status, $service_details);
            // include '../view/matches.php';
        }

         public function collectReadProduct($id) {
            $matches = $this->matchesLogic->readProduct($id);
            include '../view/read.php';
        }

        function collectreadAllmatches() {
            $matches = $this->matchesLogic->readAllmatches();
            include '../view/read.php';
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