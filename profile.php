<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';
if (!isset($_SESSION["loggedin_user_id"])) {
  echo "Error: Log in first!";
} else {

  if (isset($_POST["submit"])) {
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $nameUser = $_POST["username"];
    $emailUser = $_POST["email"];

    if ($password != $confirmPassword) {
      $statusAlert = 'alert-danger';
      $statusMessage = 'Wachtwoord komt niet overeen';
    } else {
      if ($password == '' || $confirmPassword == '') {
        $statusAlert = 'alert-danger';
        $statusMessage = 'Vul alle velden in';
        $products = $db->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        $products->bindParam("name", $nameUser);
        $products->bindParam("email", $emailUser);
        $products->bindParam("id", $_SESSION['loggedin_user_id']);
        if ($products->execute()) {
          $statusAlert = 'alert-succes';
          $statusMessage = 'Profiel geupdate!';
        }
      } else {
        $products = $db->prepare("UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id");
        $products->bindParam("name", $nameUser);
        $products->bindParam("email", $emailUser);
        $products->bindParam("password", $password);
        $products->bindParam("id", $_SESSION['loggedin_user_id']);
        if ($products->execute()) {
          $statusAlert = 'alert-succes';
          $statusMessage = 'Wachtwoord geupdate!';
        } else {
          $statusAlert = 'alert-danger';
          $statusMessage = 'Er is iets mis gegaan';
        }
      }
    }
  }
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
      if (isset($statusAlert)) {
        echo "<div class='alert $statusAlert' role='alert'>$statusMessage</div>";
      } else {
        echo '';
      }
      ?>
      <div class="col-sm-12 mt-4">
        <h4>Jouw profiel</h4>
        <form method="POST" action="">
          <input type="hidden" name="form-sort" value="editprofile">
          <div class="row mt-3">
            <div class="col">
              <input type="text" name="username" class="form-control" value="<?php echo $userName ?>" placeholder="Uw naam" required>
            </div>
            <div class="col">
              <input type="email" name="email" class="form-control" value="<?php echo $userEmail ?>" placeholder="jan@jan.nl" required>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <label for="password">Voer een nieuw wachtwoord in</label>
              <input type="password" name="password" class="form-control">
              <small class="text-danger">*Laat het wachtwoord leeg om het niet aan te passen!</small>
            </div>
            <div class="col">
              <label for="confirm_password">Herhaal je wachtwoord</label>
              <input type="password" name="confirm_password" class="form-control">
            </div>
          </div>
          <div class="form-group mt-3">
            <button type="submit" name="submit" class="btn btn-outline-danger">Profiel aanpassen</button>
          </div>
        </form>
      </div>
      <?php
      include_once 'components/footer.php';
      ?>
    </div>
  </body>

  </html>
<?php
}
