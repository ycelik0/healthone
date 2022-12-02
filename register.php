<?php
require_once 'dbconnectie.php';

if (isset($_POST["submit"])) {
  $username = filter_input(INPUT_POST, "username");
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, "password");
  $role = 'member';

  $users = $db->prepare("SELECT * FROM `users`");
  $users->execute();
  $user = $users->fetch(PDO::FETCH_ASSOC);
  $checkUserEmail = $user["email"];

  if ($email = $checkUserEmail) {
    $alertStatus = 'alert-warning';
    $alertMessage = 'Email is in gebruik';
} else {
    $query = $db->prepare("INSERT INTO users (name, email, password, role) VALUES (:username, :email, :password, :role)");
    $query->bindParam("username", $username);
    $query->bindParam("email", $email);
    $query->bindParam("password", $password);
    $query->bindParam("role", $role);
    if ($query->execute()) {
      $alertStatus = 'alert-success';
      $alertMessage = "Gegevens Opgeslagen <a href='./login.php'>Log in!</a>";
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
    if (isset($alertStatus)) {
      echo "<div class='alert $alertStatus' role='alert'>$alertMessage</div>";
    } else {
      echo '';
    }
    ?>
    <div class="col-sm-12 mt-3">
      <h4>Registreer je bij ons!</h4>
      <form method="POST" action="">
        <input type="hidden" name="form-sort" value="register">
        <div class="row mt-3">
          <div class="form-group col">
            <label for="name">Wat is je naam?</label>
            <input type="text" class="form-control" name="username" placeholder="Jouw volledige naam" required>
          </div>
          <div class="form-group col">
            <label for="email">E-mail adres</label>
            <input type="email" class="form-control" name="email" placeholder="jan@jan.nl" required>
          </div>
        </div>
        <div class="row mt-3">
          <div class="form-group col">
            <label for="password">Wachtwoord</label>
            <input name="password" type="password" class="form-control" placeholder="Wachtwoord" required>
          </div>
        </div>
        <div class="form-group mt-3">
          <button type="submit" name="submit" class="btn btn-outline-primary">Registreer je vandaag</button>
        </div>
        <div class="form-group mt-3">
          <a href="./login.php">
            Al een account? Klik hier om in te loggen.
          </a>
        </div>
      </form>
    </div> <?php
    include_once 'components/footer.php';
    ?>
  </div>
</body>

</html>