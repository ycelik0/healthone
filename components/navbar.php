<?php
if (isset($_SESSION["loggedin_user_id"])) {
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">
      Home
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="navbar-nav text-center">
        <li class="nav-item">
          <a class="nav-link " href="./categories.php">Categorieen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./contact.php">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto text-center">
        <li class="nav-item">
          <a class="nav-link " href="./profile.php">Profile</a>
        </li>
        <?php 
        if ($userRole == 'admin') {
          ?>
        <li class="nav-item">
          <a class="nav-link " href="./admin_dashboard.php">Dashboard</a>
        </li>
          <?php
        }
        ?>
        <li class="nav-item">
          <a class="nav-link  " href="./logout.php">Uitloggen</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
} else {
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">
      Home
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="navbar-nav text-center">
        <li class="nav-item">
          <a class="nav-link " href="./categories.php">Categorieen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./contact.php">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto text-center">
        <li class="nav-item">
          <a class="nav-link " href="./register.php">Registreren</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="./login.php">Inloggen </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
}
?>