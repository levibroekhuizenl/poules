<DOCTYPE html>
<html>
<body>
  <div class='container matchbar'>
    <div class='row'>
      <div class='col-lg-12'>
          <?php
            include 'controller/matchesController.php';
            $test  = new MatchesController();
            $test->handleRequest();
            if(isset($test->matches)){
              $matches = $test->matches;
              echo $matches;
            }else {
              echo 'geen wedstrijden beschikbaar';
            }
           ?>
      </div>
    </div>
  </div>
</body>
</html>