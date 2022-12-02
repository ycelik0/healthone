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
    <h4 class="pt-4">Contact met Health<span class="text-danger">One</span></h4>
    <div class="row">
      <div class="col-md-6 col-12">
        Wilt u meer informatie, of heeft u een vraag of suggestie, we horen graag van u!
        <form method="POST" action="/contact">
          <input type="hidden" name="form-sort" value="contact">
          <div class="row mt-3">
            <div class="col">
              <input type="text" name="name" class="form-control" required="" value="<?php if($_SESSION) {echo $userName;} else {echo '';} ?>" placeholder="Uw naam">
            </div>
            <div class="col">
              <input type="email" name="email" required="" class="form-control" value="<?php if($_SESSION) {echo $userEmail;} else {echo '';} ?>" placeholder="jan@jan.nl">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <input type="text" name="name" class="form-control" required="" value="" placeholder="0612345678">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              Laat een berichtje achter!
              <textarea name="remark" class="form-control" rows="3"></textarea>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <button type="submit" class="btn btn-outline-success">Verstuur het formulier</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6 col-12">
        <iframe src="https://maps.google.com/maps?q=Tinwerf%2016,%202544%20ED%20Den%20Haag&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen=""></iframe>
      </div>
    </div>
    <?php
    include_once 'components/footer.php';
    ?>
  </div>
</body>

</html>