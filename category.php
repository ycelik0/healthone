<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$categories = $db->prepare("SELECT * FROM `products` WHERE category_id = :id");
$categories->bindParam("id", $id);
$categories->execute();
$result = $categories->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <?php  
  include_once 'components/head.php';
  ?>
<body>
  <div class="container p-3 my-4">
    <?php
    include_once './components/header.php';
    include_once './components/navbar.php';
    include_once './components/picture.php';
    ?>
    <div class="row gy-3 mt-3">
    <?php
    foreach ($result as &$product) {
      ?>
      <div class="col-sm-4 col-md-3">
        <div class="card h-100">
          <div class="card-body text-center d-flex flex-column justify-content-between">
            <a href="product.php?id=<?php echo $product['id'] ?>">
              <img class="product-img img-fluid center-block" src="<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>">
            </a>
            <div class="card-title mb-3"><?php echo $product['name'] ?></div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
    </div>    
    <?php
    include_once './components/footer.php';
    ?>
</div>
</body>
</html>