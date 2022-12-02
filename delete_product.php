<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';
if ($userRole != 'admin') {
  echo "Error: Not Allowed";
} else {
  $productID = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

  $products = $db->prepare("SELECT * FROM `products` WHERE id = :id");
  $products->bindParam("id", $productID);
  $products->execute();
  $result = $products->fetch(PDO::FETCH_ASSOC);

  if (isset($_POST["submit"])) {
    $deleteProduct = $db->prepare("DELETE FROM reviews WHERE product_id = :id");
    $deleteProduct->bindParam("id", $productID);
    $deleteProduct->execute();

    $deleteProduct = $db->prepare("DELETE FROM products WHERE id = :id");
    $deleteProduct->bindParam("id", $productID);

    if ($deleteProduct->execute()) {
      header("Location: ./admin_dashboard.php");
    } else {
      print_r($deleteProduct->errorInfo());
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
    
    if(isset($statusAlert)) 
    { 
      echo "<div class='alert $statusAlert' role='alert'>$statusMessage</div>";
    } else {
      echo '';
    }
    ?>
    <div class="row gy-3 mt-3">
      <h4>Weet je zeker dat je Product "<?php echo $result["name"];?>" wilt wissen?</h4>
      <form method="POST" action="">
        <button type="submit" name="submit" class="btn btn-danger mt-5">Ja ik weet het zeker!</button>
      </form>
      </div>
    <?php
    
    include_once 'components/footer.php';
    ?>
  </div>
</body>

  </html>