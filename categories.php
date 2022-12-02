<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';
$categories = $db->prepare("SELECT * FROM `categories`");
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
    include_once 'components/header.php';
    include_once 'components/navbar.php';
    include_once 'components/picture.php';
    ?>
    <div class="row gy-3 mt-3">
      <?php
        foreach ($result as &$category) {
          ?>
          <div class="col-sm-4 col-md-3">
            <div class="card">
              <div class="card-body text-center">
                <a href="category.php?id=<?php echo $category['id'] ?>">
                  <img class="product-img img-fluid center-block" src="<?php echo $category['image'] ?>">
                </a>
                <div class="card-title mb-3">
                  <?php echo $category['name'] ?>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
      ?>
    </div>    
    <?php
    include_once 'components/footer.php';
    ?>
</div>
</body>
</html>