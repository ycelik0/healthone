<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$products = $db->prepare("SELECT * FROM `products` WHERE id = :id");
$products->bindParam("id", $id);
$products->execute();
$result = $products->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as &$product) {
  $productName = $product["name"];
  $productImage = $product["image"];
  $productDetail = $product["detail"];
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
      <div class="col-sm-4 col-md-3">
        <div class="card">
          <div class="card-body text-center">
            <img class="product-img img-fluid center-block" src="<?php echo $productImage ?>" alt="Roeitrainer">
            <div class="card-title mb-3"><?php echo $productName ?></div>
          </div>
        </div>
      </div>
      <div class="col-sm-8 col-md-9">
        <div class="card description-card">
          <div class="card-head text-center p-3">
            <h4><?php echo $productName ?></h4>
          </div>
          <div class="card-body">
            <h5>Omschrijving:</h5>
            <?php echo $productDetail ?>
          </div>
        </div>
      </div>
    </div>
    <?php
    include_once 'components/review.php';
    include_once 'components/footer.php';
    ?>
</div>
</body>
</html>