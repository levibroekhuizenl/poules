    <?php

class OutputData {

    function __construct() {
    }

    function createForm() {
        //todo
    }

    function createSelectBox() {
        //todo
        
    }

    function createTable($rows) {
        $html = '<table border="1">';
            	foreach($rows as $row){
            		$html .= '<tr class="col-12">';
                        $html .= '<div class="row">';
                        $html .= '<div class="game">';
                        $html .= $row['home'];
                        $html .= '</div>';
                        $html .= '<div class="game">';
                        $html .= ' - ';
                        $html .= '</div>';
                        $html .= '<div class="game">';
                        $html .= $row['away'];
                        $html .= '</div>';
                        $html .= '<div class="date">' . $row['date'] . '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '<br>';
            		$html .= '</tr>';
            	}
        $html .= '</table>';

        return $html;
    }

    function createTable2($rows) {
        if (!empty($rows)) {
        $html = '<table border="1">';
            $html .= '<tr>';
                foreach($rows[0] as $key => $value){
                    $html .= "<th>" . $key . "</th>";
                }
            $html .= "</tr>";
                foreach($rows as $row){
                    $html .= '<tr>';
                        foreach($row as $columns) {
                            $html .= "<td>" . $columns . "</td>";
                        }
                        $html .= "<td>" . '<button><a id="button-td" href="../controller/ProductsController.php?todo=read&id=' . $row['service_id'] . '">' . 'Read' . '</a></button' . "</td>";
                        $html .= "<td>" . '<button><a href="controller/productsController.php?todo=delete&id=' .$row['id'] . '">' . 'Delete' . '</button' . "</td>";
                        $html .= "<td>" . '<button><a href="controller/productsController.php?todo=updateform&id=' .$row['id'] . '">' . 'Update' . '</a></button' . "</td>";
                    $html .= '</tr>';
                }
        $html .= '</table>';

        return $html;
        } else {
            return "Geen gegevens gevonden.";
        }
    }


    function __destruct() {
        //todo
    }
}

?>

<html>
            <div id='content'>
            </div>
</html>