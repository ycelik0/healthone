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
    <div class='row mt-5'>
      <div class="d-flex justify-content-between align-items-center">
        <h5>Welkom <?php echo $userName ?></h5>
        <span class="badge badge-<?php if($userRole == "admin") {echo 'danger';} else {echo 'primary';} ?> ms-3"><?php echo strtoupper($userRole) ?></span>
      </div>
      <p class='text-break'>
          Fit en gezond zijn is geen vanzelfsprekendheid.
          We moeten er zelf wat voor doen. Goede, gezonde voeding is hiervoor de basis
          Bewegen hoort hier ook bij. Regelmatig bewegen zorgt voor een goede doorbloeding en 
          draagt bij aan ontspanning van lichaam en geest.
          Sporten is goed voor sterkere spieren en voor de conditie. Sportcenter Health One
          heeft verschillende sportapparaten om mee te kunnen werken aan je conditie. 
      </p>
    </div>
    <?php
    include_once 'components/footer.php';
    ?>
  </div>
</body>

</html>