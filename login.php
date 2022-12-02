<?php
require_once 'dbconnectie.php';
session_start();
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $users = $db->prepare("SELECT * FROM `users` WHERE password = :password AND email = :email");
  $users->bindParam("password", $password);
  $users->bindParam("email", $email);
  $users->execute();
  $user = $users->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    $userExists = false;
    $alertMessage = 'alert-warning';
  } else {
    $userExists = true;

    $_SESSION['loggedin_user_id'] = $user['id'];

    header("Location: ./logged_in.php");
  }

  if (($email == '') ||($password == ''))  {
    $alertMessage = 'text-danger';
    $userStatus = 'Velden zijn leeg';
  } else if ($userExists) {
    $alertMessage = 'alert-succes';
    $userStatus = 'Logged In';
  } else {
    $userStatus = 'Email/wachtwoord is incorrect';
  }
} else {
  $email = '';
  $password = '';
  $userStatus = '';
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
    ?>
    <div class="row gy-3 mt-3">
      <?php if ($userStatus) { ?>
      <div class="alert <?php echo $alertMessage; ?>"><?php echo $userStatus ?></div>
      <?php } else {echo '';} ?>
      <div class="col-sm-12">
        <h4>Voer je gegevens in om in te loggen</h4>
        <form method="POST" action="">
          <input type="hidden" name="form-sort" value="login">
          <div class="row mt-3">
            <div class="form-group col-6">
              <label for="email">E-mail adres</label>
              <input name="email" type="email" required="" class="form-control" placeholder="jan@jan.nl">
            </div>
            <div class="row mt-3">
              <div class="form-group col-6">
                <label for="password">Wachtwoord</label>
                <input name="password" type="password" required="" class="form-control" placeholder="Wachtwoord">
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <button type="submit" name="submit" class="btn btn-outline-primary">Inloggen</button>
          </div>
          <div class="form-group mt-3">
            <a href="./register.php" class="">
              Nog geen account? Klik hier om je te registreren
            </a>
          </div>
        </form>
      </div>
    </div>
    <?php
    include_once 'components/footer.php';
    ?>
  </div>
</body>
</html>