<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';
?>
<!DOCTYPE html>
<html lang="en">
  <?php  
  include_once 'components/head.php';
  ?>
<body>
  <div class="container p-3 my-4">
    <?php
    include_once 'components/header.php';
    include_once 'components/navbar.php';
    include_once 'components/picture.php';
    ?>
    <h4 class="pt-4">Sportcenter Health<span class="text-danger">One</span></h4>
    <div class="row">
      <div class="col-6">
        <p>
          Fit en gezond zijn is geen vanzelfsprekendheid.
        </p>
        <p>
          We moeten er zelf wat voor doen. Goede, gezonde voeding is hiervoor de basis.
        </p>
        <p>
          Bewegen hoort hier ook bij. Regelmatig bewegen zorgt voor een goede doorbloeding en draagt bij
          aan ontspanning van lichaam en geest.
        </p>
        <p>
          Sporten is goed voor sterkere spieren en voor de conditie. Sporcenter ChielOne heeft
          verschillende sportapparaten om mee te kunnen werken aan je conditie.
        </p>
        <h5>
          Bekijk onze apparaten en laat een review achter!
        </h5>
        <p>
          Op onze website kan je al onze apparaten zien en bewonderen wat zij doen.
        </p>
        <p>
          We moedigen onze sporters ook zeker aan een review achter te laten op onze website.
        </p>
        <h5>Vragen?</h5>
        <p>
          Heb je vragen? Kijk dan even op onze <a href="./contact.php">contact</a> pagina.
        </p>
      </div>
      <div class="col-6">
        <img class="img-fluid" src="img\home-img.jpg" alt="home-img">
      </div>
    </div>
    <?php
    include_once 'components/footer.php';
    ?>
</div>
</body>
</html>